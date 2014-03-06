<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \Sonrisa\Component\Geodata\PostalCode;

/**
 * Class PostalCodeTest
 */
class PostalCodeTest extends \PHPUnit_Framework_TestCase
{

/*
    public function testConfigFileNotFound()
    {
        $this->postal = \Sonrisa\Component\Geodata\PostalCode::getInstance();

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
        $result = PostalCode::isSupported('ES');
        $this->assertTrue($result);
    }

    public function testIsSupportedReturnsFalse()
    {
        $result = PostalCode::isSupported('XXXX');
        $this->assertFalse($result);
    }

    public function testIsValidReturnsTrue()
    {
        $result = PostalCode::isValid('ES',"08029");
        $this->assertTrue($result);
    }

    public function testIsValidThrowsExceptionBecauseOfCountryCode()
    {
        $this->setExpectedException("Sonrisa\\Component\\Geodata\\Exceptions\\GeodataException");
        PostalCode::isValid('XXXX',"08029");
    }

    public function testIsValidReturnsFalseBecauseOfPostalCode()
    {
        $result = PostalCode::isValid('ES',"XXXX");
        $this->assertFalse($result);
    }

    public function testCountryCodesReturnsData()
    {
        $result = PostalCode::countryCodes('ES');
        $this->assertEquals(array('/^\d\d\d\d\d$/'),$result);
    }

    public function testCountryCodesReturnsEmptyData()
    {
        $result = PostalCode::countryCodes('AO');
        $this->assertEquals(array(),$result);
    }

    public function testCountryCodesThrowsException()
    {
        $this->setExpectedException("Sonrisa\\Component\\Geodata\\Exceptions\\GeodataException");
        PostalCode::countryCodes('XXXXX');
    }

    public function testsMatchesWithReturnsResults()
    {
        $result = PostalCode::matchesWith('08029');

        $this->assertNotEmpty($result);
        $this->assertTrue(in_array('ES',$result,true));
    }

    public function testsMatchesWithReturnsFalse()
    {
        $result = PostalCode::matchesWith('XXXXXXXX');
        $this->assertEmpty($result);
    }
}
