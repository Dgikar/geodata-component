[![Build Status](https://travis-ci.org/sonrisa/geodata-component.png)](https://travis-ci.org/sonrisa/geodata-component) Geodata Component
=================

Component containing all sorts of i18n data, such as Date formats, Postal Codes, Country, Region, City lists, etc.

<a name="block1"></a>
## 1. Country List, Region List, City List.

---

<a name="block2"></a>
## 2. Country Address formatting


---

<a name="block3"></a>
## 3. Postal Codes

Postal Codes validness are checked using a country's postal code or a ISO 3166 2-letter code.

<a name="block31"></a>
### 3.1 - Check If Country Is Supported

```php
<?php
include 'vendor/autoload.php';

try {
    $postal = new \Sonrisa\Component\Geodata\PostalCode();

    $supported = $postal->isSupported('US'); //returns TRUE.
    $supported = $postal->isSupported('XXX'); //returns FALSE.

} catch(\Sonrisa\Component\Geodata\Exceptions\GeodataException $e) {
    echo $e->getMessage();
}
```

<a name="block32"></a>
### 3.2 - Check If Postal Code Is Properly Formatted

```php
<?php
include 'vendor/autoload.php';

$postal = new \Sonrisa\Component\Geodata\PostalCode();
try {
    //returns TRUE if OK, FALSE otherwise.
    $supported = $postal->isValid('ES','08029');

    //throws GeodataException
    $supported = $postal->isValid('XXXXXX','08029');

} catch(\Sonrisa\Component\Geodata\Exceptions\GeodataException $e) {
    echo $e->getMessage();
}
```

<a name="block33"></a>
### 3.3 - Resolve Postal Code to possible Countries

```php
<?php
include 'vendor/autoload.php';

try {
    $postal = new \Sonrisa\Component\Geodata\PostalCode();

    //returns an array with all possible countries.
    $supported = $postal->matchesWith('08029');

    //returns empty array.
    $supported = $postal->matchesWith('XXXXXXXX');

} catch(\Sonrisa\Component\Geodata\Exceptions\GeodataException $e) {
    echo $e->getMessage();
}
```

<a name="block34"></a>
### 3.4 - Resolve Country to Postal Code format.

```php
<?php
include 'vendor/autoload.php';

try {
    $postal = new \Sonrisa\Component\Geodata\PostalCode();

    //returns an array with all possible postal codes.
    $supported = $postal->countryCodes('US');

    //throws GeodataException
    $supported = $postal->countryCodes('XXXX');

} catch(\Sonrisa\Component\Geodata\Exceptions\GeodataException $e) {
    echo $e->getMessage();
}
```

---

<a name="block4"></a>
## 4. Currencies

<a name="block41"></a>
### 4.1 - Resolve Currency to its valid formatting using its symbol

<a name="block42"></a>
### 4.2 - Resolve Currency to its valid formatting using its letter representation

---

<a name="block5"></a>
## 5. Number formatting

<a name="block51"></a>
### 5.1 - Get country's format by passing a country code.

<a name="block52"></a>
### 5.2 - Convert from a country's number format to another country's formatting.

---

<a name="block6"></a>
## 6. Fully tested.
Testing has been done using PHPUnit and [Travis-CI](https://travis-ci.org). All code has been tested to be compatible from PHP 5.3 up to PHP 5.6 and [Facebook's PHP Virtual Machine: HipHop](http://hiphop-php.com).

---

<a name="block7"></a>
## 7. Author
Nil Portugués Calderó
 - <contact@nilportugues.com>
 - http://nilportugues.com

<a name="references"></a>
## References

- http://download.geonames.org/export/dump/
- http://www.addressdoctor.com/en/countries-data/address-formats.html
- http://www.opengeocode.org/download.php#countrynames
- https://code.google.com/p/libaddressinput/wiki/AddressValidationMetadata