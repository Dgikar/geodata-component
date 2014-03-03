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
    protected $country_to_postal = array();

    /**
     * @var array
     */
	protected $postal_to_country = array();

    /**
     * @var string
     */
	protected $config_file = 'PostalCodes/Resources/config.php';

	/**
     * @throws \Sonrisa\Component\Geodata\Exceptions\GeodataException
	 */
	public function __construct()
	{
        $this->config_file = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->config_file;

		//Load the array from the Resources folder.
		if(file_exists($this->config_file))
		{
			$this->loadConfigFile();
		}
		else
		{
			throw new GeodataException('Postal Code configuration file not found');
		}
	}

	/**
	 * Loads config file to the country to postal array.
	 */
	protected function loadConfigFile()
	{
		$this->country_to_postal = include($this->config_file);
	}

	/**
	 * Converts the array to valid regular expressions
	 *
     * @param $expression
     * @return string
     */
    protected function buildRegex($expression)
	{
		$patterns = array("#","@","*");
		$replacements = array( '\d','[a-zA-Z]', '[a-zA-Z0-9]');

  		return str_replace($patterns,$replacements,$expression);
	}


	/**
	 * Calculates the array "postal to country code" based on the "country to postal code" array.
	 */
	protected function buildPostalToCountryRegexArray()
	{
		foreach($this->country_to_postal as $country => $formats)
		{
			foreach($formats as $code)
			{
                $code = $this->buildRegex($code);

				if(!empty($this->postal_to_country[$code]))
				{
					$this->postal_to_country[$code][] = $country;
				}
				else
				{
					$this->postal_to_country[$code] = array($country);
				}
			}
		}		
	}

	/**
	 * Check if a country has postal codes.
	 *
	 * @param string $country_code
	 * @return boolean			 
	 */
	public function isSupported($country_code)
	{
		$supported = false;
        $country_code = strtoupper($country_code);

		if( array_key_exists($country_code, $this->country_to_postal) && !empty($this->country_to_postal[$country_code]) )
		{
			$supported = true;
		}
		return $supported;
	}

	/**
	 * Pass a country code and a postal code. Returns TRUE if valid, FALSE otherwise. 
	 *
     * @param string $country_code
     * @param string $postal_code
     * @return bool
     * @throws \Sonrisa\Component\Geodata\Exceptions\GeodataException
     */
    public function isValid($country_code,$postal_code)
	{
		$valid = false;
        $country_code = strtoupper($country_code);

		if( !array_key_exists($country_code, $this->country_to_postal) )
		{
			throw new GeodataException("Invalid country code: {$country_code}");
		}
		else
		{
			if(!empty($this->country_to_postal[$country_code]))
			{
	 			foreach($this->country_to_postal[$country_code] as $pattern)
	        	{
	            	if(preg_match($this->buildRegex($pattern), $postal_code))
	            	{
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
     * @param string $country_code
     * @return array
     * @throws \Sonrisa\Component\Geodata\Exceptions\GeodataException
     */
    public function countryCodes($country_code)
	{
		$codes = array();
        $country_code = strtoupper($country_code);

		if( !array_key_exists($country_code, $this->country_to_postal) )
		{
            throw new GeodataException("Invalid country code: {$country_code}");
        }
        else
        {
            foreach($this->country_to_postal[$country_code] as &$code)
            {
                $codes[] = $this->buildRegex($code);
            }
		}
		return $codes;
	}


    /**
     * Pass a postal code and return the matching countries.
     *
     * @param string $postal_code
     * @return array
     */
    public function matchesWith($postal_code)
    {
        if(empty($this->postal_to_country))
        {
            $this->buildPostalToCountryRegexArray();
        }
        $matchArray = $this->postal_to_country;

        $codes = array();
        $end = false;
        $pattern = key($matchArray);
        $countries = array_shift($matchArray);

        do
        {
            if(preg_match($this->buildRegex($pattern), $postal_code))
            {
                $codes = $countries;
                $end = true;
            }
            else
            {
                if(empty($matchArray))
                {
                   $end = true;   
                }
                else
                {
                    $pattern = key($matchArray);
                    $countries = array_shift($matchArray);
                }                               
            }
        } while($end == false);

        return $codes;
    }
}
