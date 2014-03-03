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
			//Build regex for Country to Postal Code
			$this->country_to_postal = include($this->config_file);
			$this->formatRegexArray();

			//Calculate the reverse array
		}
		else
		{
			throw new Exception('Postal Code array not found');
		}

		//
	}

	/**
	 * Converts the array to valid regular expressions
	 */
	protected function formatRegexArray()
	{
		$patterns = array("#","@","*");
		$replacements = array( '\d','[a-zA-Z]', '[a-zA-Z0-9]');

  		$this->country_to_postal = str_replace($patterns,$replacements,$this->country_to_postal);
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
	 */
	public function countryCodes($country_code)
	{

	}
}
