<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \Sonrisa\Component\Geodata\Country;

/**
 * Class CountryTest
 */
class CountryTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \Sonrisa\Component\Geodata\Country
	 */
	protected $country;

	public function setUp()
	{
		$this->country = new \Sonrisa\Component\Geodata\Country('ES');
	}

	public function testPlaceholder()
	{

	}

}