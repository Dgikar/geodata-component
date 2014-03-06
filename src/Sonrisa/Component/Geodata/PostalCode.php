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
 * Class PostalCode
 * @package Sonrisa\Component\Geodata
 */
class PostalCode
{
    /**
     * @var array
     */
    protected static $country_to_postal = array();

    /**
     * @var array
     */
    protected static $postal_to_country = array();

    /**
     * @var string
     */
    protected static $config_file = 'PostalCodes/Resources/format.php';

    /**
     * @var \Sonrisa\Component\Geodata\PostalCode
     */
    protected static $_instance;

    /**
     *
     */
    protected function __construct() {}

    /**
     * @return SharedValidator
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
            self::setUp();
        }

        return self::$_instance;
    }

    /**
     * Reads the file with the postal codes, once.
     */
    protected static function setUp()
    {
        self::$config_file = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.self::$config_file;

        //Load the array from the Resources folder.
        if (file_exists(self::$config_file)) {
            self::loadConfigFile();
        } else {
            throw new GeodataException('Postal Code configuration file not found');
        }
    }

    /**
     * Loads config file to the country to postal array.
     */
    protected static function loadConfigFile()
    {
        self::$country_to_postal = include(self::$config_file);
    }

    /**
     * Converts the array to valid regular expressions
     *
     * @param $expression
     * @return string
     */
    protected static function buildRegex($expression)
    {
        $patterns = array("#","@","*");
        $replacements = array( '\d','[a-zA-Z]', '[a-zA-Z0-9]');

          return str_replace($patterns,$replacements,$expression);
    }

    /**
     * Calculates the array "postal to country code" based on the "country to postal code" array.
     */
    protected static function buildPostalToCountryRegexArray()
    {
        foreach (self::$country_to_postal as $country => $formats) {
            foreach ($formats as $code) {
                $code = self::buildRegex($code);

                if (!empty(self::$postal_to_country[$code])) {
                    self::$postal_to_country[$code][] = $country;
                } else {
                    self::$postal_to_country[$code] = array($country);
                }
            }
        }
    }

    /**
     * Check if a country has postal codes.
     *
     * @param  string  $country_code
     * @return boolean
     */
    public static function isSupported($country_code)
    {
	self::getInstance();

        $supported = false;
        $country_code = strtoupper($country_code);

        if ( array_key_exists($country_code,  self::$country_to_postal) && !empty( self::$country_to_postal[$country_code]) ) {
            $supported = true;
        }

        return $supported;
    }

    /**
     * Pass a country code and a postal code. Returns TRUE if valid, FALSE otherwise.
     *
     * @param  string                                                 $country_code
     * @param  string                                                 $postal_code
     * @return bool
     * @throws \Sonrisa\Component\Geodata\Exceptions\GeodataException
     */
    public static function isValid($country_code,$postal_code)
    {
	self::getInstance();

        $valid = false;
        $country_code = strtoupper($country_code);

        if ( !array_key_exists($country_code, self::$country_to_postal) ) {
            throw new GeodataException("Invalid country code: {$country_code}");
        } else {
            if (!empty(self::$country_to_postal[$country_code])) {
                 foreach (self::$country_to_postal[$country_code] as $pattern) {
                    if (preg_match(self::buildRegex($pattern), $postal_code)) {
                        $valid = true;
                    }
                }
            }
        }

        return $valid;
    }

    /**
     * Pass a country code and retrieve the country postal codes.
     *
     * @param  string                                                 $country_code
     * @return array
     * @throws \Sonrisa\Component\Geodata\Exceptions\GeodataException
     */
    public static function countryCodes($country_code)
    {
	self::getInstance();

        $codes = array();
        $country_code = strtoupper($country_code);

        if ( !array_key_exists($country_code, self::$country_to_postal) ) {
            throw new GeodataException("Invalid country code: {$country_code}");
        } else {
            foreach (self::$country_to_postal[$country_code] as &$code) {
                $codes[] = self::buildRegex($code);
            }
        }

        return $codes;
    }

    /**
     * Pass a postal code and return the matching countries.
     *
     * @param  string $postal_code
     * @return array
     */
    public static function matchesWith($postal_code)
    {
	self::getInstance();

        if (empty(self::$postal_to_country)) {
            self::buildPostalToCountryRegexArray();
        }

        $matchArray = self::$postal_to_country;

        $codes = array();
        $end = false;
        $pattern = key($matchArray);
        $countries = array_shift($matchArray);

        do {
            if (preg_match(self::buildRegex($pattern), $postal_code)) {
                $codes = $countries;
                $end = true;
            } else {
                if (empty($matchArray)) {
                   $end = true;
                } else {
                    $pattern = key($matchArray);
                    $countries = array_shift($matchArray);
                }
            }
        } while ($end == false);

        return $codes;
    }
}
