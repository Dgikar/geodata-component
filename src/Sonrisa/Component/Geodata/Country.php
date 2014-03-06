<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Sonrisa\Component\Geodata;

use Sonrisa\Component\Geodata\Address;
use Sonrisa\Component\Geodata\PostalCode;

/*
 * Class Country
 * @package Sonrisa\Component\Geodata
 */
class Country
{
    protected $iso_code;

    public function __construct($iso_code)
    {

    }

    /**
     * @param string $original_iso_name
      * @param string $conversion_iso_name
      * @param string $value
     * @return string
     */
    public function convertCode($original_iso_name,$conversion_iso_name,$value)
    {

    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        $currency = '';

        return $currency;
    }

    /**
     * @param mixed digit
     * @return string
     */
    public function formatDigits($digit)
    {

    }

    /**
     * @param  string $postal_code
     * @return bool
     */
    public function validPostalCode($postal_code)
    {
        $post = new PostalCode();

        if ($post->isSupported($this->iso_code)) {
            return $post->isValid($this->iso_code,$postal_code);
        }
    }

    /**
     * Alias of validPostalCode
     *
     * @param  string $postal_code
     * @return bool
     */
    public function validZipCode($postal_code)
    {
        return $this->validPostalCode($postal_code);
    }

    /**
     * Returns a string with the correct address format for the current country.
     *
     * @param  \Sonrisa\Component\Geodata\Address $address
     * @return string
     */
    public function getAddress(Address $address)
    {
        $address->setCountry($this->iso_code);

        return $address->build();
    }

    /**
     * @return string
     */
    public function getTLD()
    {

    }
}
