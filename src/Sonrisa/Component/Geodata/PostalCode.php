<?php

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
	protected $config_file = './PostalCode/Resources/config.php';

	/**
	 *
	 */
	public function __construct()
	{
		//Load the array from the Resources folder.
		if(file_exists($this->config_file))
		{
			$this->loadConfigFile();
			$this->buildCountryToPostalRegexArray();
			$this->buildPostalToCountryRegexArray();
		}
		else
		{
			throw new Exception('Postal Code array not found');
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
	 */
	protected function buildCountryToPostalRegexArray()
	{
		$patterns = array("#","@","*");
		$replacements = array( '\d','[a-zA-Z]', '[a-zA-Z0-9]');

  		$this->country_to_postal = str_replace($patterns,$replacements,$this->country_to_postal);
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
	 */
	public function isSupported($country_code)
	{

	}

	/**
	 * Pass a country code and a postal code. Returns TRUE if valid, FALSE otherwise. 
	 */
	public function isValid($country_code,$postal_code)
	{

	}

	/**
	 * Pass a postal code and return the matching countries.
	 */
	public function matchesWith($postal_code)
	{

	}

	/**
	 * Pass a country code and retrieve the country postal codes.
	 *
	 * @param string $country_code
	 * @return array	
	 */
	public function countryCodes($country_code)
	{
		$codes = array();
		if( array_key_exists(strtoupper($country_code), $this->country_to_postal) )
		{
			$codes = $this->country_to_postal[$country_code];
		}
		return $codes;
	}
}
