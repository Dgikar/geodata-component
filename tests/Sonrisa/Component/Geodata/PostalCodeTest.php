<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class PostalCodeTest
 */
class PostalCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Sonrisa\Component\Geodata\PostalCode
     */
    protected $postal;

    public function setUp()
    {
        $this->postal = \Sonrisa\Component\Geodata\PostalCode::getInstance();
    }

/*
    public function testConfigFileNotFound()
    {
        $this->setExpectedException("Sonrisa\\Component\\Geodata\\Exceptions\\GeodataException");

        $reflectionClass = new ReflectionClass('\Sonrisa\Component\Geodata\PostalCode');
        $property = $reflectionClass->getProperty('config_file');
        $property->setAccessible(true);
        $property->setValue($this->postal,'foo');

        call_user_func_array(array($this->postal,'getInstance'),array());
    }
*/
    public function testIsSupportedReturnsTrue()
    {
        $result = $this->postal->isSupported('ES');
        $this->assertTrue($result);
    }

    public function testIsSupportedReturnsFalse()
    {
        $result = $this->postal->isSupported('XXXX');
        $this->assertFalse($result);
    }

    public function testIsValidReturnsTrue()
    {
        $result = $this->postal->isValid('ES',"08029");
        $this->assertTrue($result);
    }

    public function testIsValidThrowsExceptionBecauseOfCountryCode()
    {
        $this->setExpectedException("Sonrisa\\Component\\Geodata\\Exceptions\\GeodataException");
        $this->postal->isValid('XXXX',"08029");
    }

    public function testIsValidReturnsFalseBecauseOfPostalCode()
    {
        $result = $this->postal->isValid('ES',"XXXX");
        $this->assertFalse($result);
    }

    public function testCountryCodesReturnsData()
    {
        $result = $this->postal->countryCodes('ES');
        $this->assertEquals(array('/^\d\d\d\d\d$/'),$result);
    }

    public function testCountryCodesReturnsEmptyData()
    {
        $result = $this->postal->countryCodes('AO');
        $this->assertEquals(array(),$result);
    }

    public function testCountryCodesThrowsException()
    {
        $this->setExpectedException("Sonrisa\\Component\\Geodata\\Exceptions\\GeodataException");
        $this->postal->countryCodes('XXXXX');
    }

    public function testsMatchesWithReturnsResults()
    {
        $result = $this->postal->matchesWith('08029');

        $this->assertNotEmpty($result);
        $this->assertTrue(in_array('ES',$result,true));
    }

    public function testsMatchesWithReturnsFalse()
    {
        $result = $this->postal->matchesWith('XXXXXXXX');
        $this->assertEmpty($result);
    }
}