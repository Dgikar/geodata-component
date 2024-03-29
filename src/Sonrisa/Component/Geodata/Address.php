<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Sonrisa\Component\Geodata;

use Sonrisa\Component\Geodata\Exceptions\GeodataException;

/**
 * Class Address
 * @package Sonrisa\Component\Geodata
 */
class Address
{
   /**
     * @var string
     */
    protected $config_file = 'Address/Resources/config.php';

   /**
    * @var array
    */
    protected $formats = array();

   /**
    * @var string
    */
    protected $format = '';

   /**
    * @var array
    */
    protected $data = array();

   /**
    * @var string
    */
    protected $iso_code = '';

    public function __construct($iso_code = '')
    {
        $this->data = array
        (
            'ADMIN_AREA'			=> '',
            'LOCALITY'				=> '',
            'RECIPIENT'				=> '',
            'ORGANIZATION'			=> '',
            'ADDRESS_LINE_1'		=> '',
            'ADDRESS_LINE_2'		=> '',
            'DEPENDENT_LOCALITY'	=> '',
            'POSTAL_CODE'			=> '',
            'SORTING_CODE'			=> '',
            'STREET_ADDRESS'		=> '',
            'COUNTRY'				=> '',
        );

        if (!empty($iso_code)) {
            $this->setUp($iso_code);
        }

    }

    public function setCountry($iso_code)
    {
        //If country is a valid iso code, set the iso code value.
        if (empty($this->formats)) {
             $this->setUp($iso_code);
        }

        //@todo: Load up country name using the iso_code and set the data array
        $country_name = '';

        //Return data
        $this->data['COUNTRY'] = $country_name;

        return $this;
    }

    protected function setUp($iso_code)
    {
        $iso_code = strtoupper($iso_code);
        $this->config_file = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->config_file;

        //Load the array from the Resources folder.
        if (file_exists($this->config_file)) {
            $this->loadConfigFile();
        } else {
            throw new GeodataException('Address configuration file not found.');
        }

        //Check if the loaded file contains the ISO code for the Address format.
        if ( !empty($this->formats[$iso_code]) ) {
            $this->format = $this->formats[$iso_code];
            $this->iso_code = $iso_code;

        } else {
            throw new GeodataException('ISO code provided not found in configuration file.');
        }
    }

    /**
     * Loads config file.
     */
    protected function loadConfigFile()
    {
        $this->formats = include($this->config_file);
    }

    /**
     * Sets the city value.
     *
     * @param  string                             $city
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setCity($city)
    {
        $this->data['LOCALITY'] = $city;

        return $this;
    }

    /**
     * Sets the subarea value.
     *
     * @param  string                             $subarea
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setCitySubArea($subarea)
    {
        $this->data['DEPENDENT_LOCALITY'] = $subarea;

        return $this;
    }

    /**
     * Sets the State value.
     *
     * @param  string                             $state
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setState($state)
    {
        $this->data['ADMIN_AREA'] = $state;

        return $this;
    }

    /**
     * Sets the recipient name value.
     *
     * @param  string                             $recipient_name
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setRecipient($recipient_name)
    {
        $this->data['RECIPIENT'] = $recipient_name;

        return $this;
    }

    /**
     * Sets the organization value.
     *
     * @param  string                             $organization
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setOrganization($organization)
    {
        $this->data['ORGANIZATION'] = $organization;

        return $this;
    }

    /**
     * Sets the postal code value.
     *
     * @param  string                             $postal_code
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setPostalCode($postal_code)
    {
        $this->data['POSTAL_CODE'] = $postal_code;

        return $this;
    }

    /**
     * Sets the sorting code value.
     *
     * @param  string                             $sorting_code
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setSortingCode($sorting_code)
    {
        $this->data['SORTING_CODE'] = $sorting_code;

        return $this;
    }

    /**
     * Sets the first street address value.
     *
     * @param  string                             $address
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setAddressLine1($address)
    {
        $this->data['ADDRESS_LINE_1'] = $address;

        return $this;
    }

    /**
     * Sets the second street address value.
     *
     * @param  string                             $address
     * @return \Sonrisa\Component\Geodata\Address
     */
    public function setAddressLine2($address)
    {
        $this->data['ADDRESS_LINE_2'] = $address;

        return $this;
    }

    /**
     * Returns a formatted address
     *
     * @param  string $line_break
     * @return string
     */
    public function build($line_break = "\n")
    {
        $data = array
        (
            '%N' => $this->data['RECIPIENT'],
            '%O' => $this->data['ORGANIZATION'],
            '%S' => $this->data['ADMIN_AREA'],
            '%C' => $this->data['LOCALITY'],
            '%D' => $this->data['DEPENDENT_LOCALITY'],
            '%X' => $this->data['SORTING_CODE'],

            '%A' => $this->data['ADDRESS_LINE_1'].$line_break.
                    $this->data['ADDRESS_LINE_2'],

            '%Z' => $this->data['POSTAL_CODE'],
            '%R' => $this->data['COUNTRY'],
        );

        $address = '';
        if (!empty($this->format)) {
            $address = str_replace(array_keys($data), $data, $this->format);
            $address = str_replace("%n", $line_break, $address);
        } else {
            $address = implode($line_break,$data);
        }

        return $address;
    }
}
