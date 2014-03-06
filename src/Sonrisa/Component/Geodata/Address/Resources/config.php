<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Based on : https://code.google.com/p/libaddressinput/wiki/AddressValidationMetadata
 * Country Code: ISO 3166 2-letter code
 *
 *		'%S' => 'ADMIN_AREA', 			//State
 *		'%C' => 'LOCALITY', 			//City
 *		'%N' => 'RECIPIENT', 			//Name
 *		'%O' => 'ORGANIZATION', 		//Organization
 *		'%1' => 'ADDRESS_LINE_1', 		//Street1
 *		'%2' => 'ADDRESS_LINE_2', 		//Street2
 *		'%D' => 'DEPENDENT_LOCALITY',
 *		'%Z' => 'POSTAL_CODE',
 *		'%X' => 'SORTING_CODE',
 *		'%A' => 'STREET_ADDRESS', 		//Is build combining %1 %2
 *		'%R' => 'COUNTRY'
 *		'%n' => "\n"
 */
return array
(
     'AC' => '',
     'AD' => '%N%n%O%n%A%n%Z %S',
     'AE' => '%N%n%O%n%A%n%C',
     'AF' => '',
     'AG' => '',
     'AI' => '',
     'AL' => '',
     'AM' => '%N%n%O%n%A%n%Z%n%C%n%S',
     'AN' => '',
     'AO' => '',
     'AQ' => '',
     'AR' => '%N%n%O%n%A%n%Z %C%n%S',
     'AS' => '%N%n%O%n%A%n%C %S %Z',
     'AT' => '%O%n%N%n%A%n%Z %C',
     'AU' => '%O%n%N%n%A%n%C %S %Z',
     'AW' => '',
     'AX' => '%O%n%N%n%A%nAX-%Z %C%nÅLAND',
     'AZ' => '%N%n%O%n%A%nAZ %Z %C',
     'BA' => '%N%n%O%n%A%n%Z %C',
     'BB' => '',
     'BD' => '%N%n%O%n%A%n%C - %Z',
     'BE' => '%O%n%N%n%A%n%Z %C',
     'BF' => '%N%n%O%n%A%n%C %X',
     'BG' => '%N%n%O%n%A%n%Z %C',
     'BH' => '%N%n%O%n%A%n%C %Z',
     'BI' => '',
     'BJ' => '',
     'BL' => '%O%n%N%n%A%n%Z %C %X',
     'BM' => '%N%n%O%n%A%n%C %Z',
     'BN' => '%N%n%O%n%A%n%C %Z',
     'BO' => '',
     'BR' => '%O%n%N%n%A%n%C-%S%n%Z',
     'BS' => '%N%n%O%n%A%n%C, %S',
     'BT' => '',
     'BV' => '',
     'BW' => '',
     'BY' => '%S%n%Z %C %X%n%A%n%O%n%N',
     'BZ' => '',
     'CA' => '%N%n%O%n%A%n%C %S %Z',
     'CC' => '%O%n%N%n%A%n%C %S %Z',
     'CD' => '%N%n%O%n%A%n%C %X',
     'CF' => '',
     'CG' => '',
     'CH' => '%O%n%N%n%A%nCH-%Z %C',
     'CI' => '%N%n%O%n%X %A %C %X',
     'CK' => '%N%n%O%n%A%n%C %Z',
     'CL' => '%N%n%O%n%A%n%Z %C%n%S',
     'CM' => '',
     'CN' => '%Z%n%S%C%D%n%A%n%O%n%N',
     'CO' => '%N%n%O%n%A%n%C, %S',
     'CR' => '%N%n%O%n%A%n%Z %C',
     'CS' => '%N%n%O%n%A%n%Z %C',
     'CV' => '%N%n%O%n%A%n%Z %C%n%S',
     'CX' => '%O%n%N%n%A%n%C %S %Z',
     'CY' => '%N%n%O%n%A%n%Z %C',
     'CZ' => '%N%n%O%n%A%n%Z %C',
     'DE' => '%N%n%O%n%A%n%Z %C',
     'DJ' => '',
     'DK' => '%O%n%N%n%A%n%Z %C',
     'DM' => '',
     'DO' => '%N%n%O%n%A%n%Z %C',
     'DZ' => '%N%n%O%n%A%n%Z %C',
     'EC' => '%N%n%O%n%A%n%Z%n%C',
     'EE' => '%N%n%O%n%A%n%Z %C',
     'EG' => '%N%n%O%n%A%n%C%n%S%n%Z',
     'EH' => '',
     'ER' => '',
     'ES' => '%N%n%O%n%A%n%Z %C %S',
     'ET' => '%N%n%O%n%A%n%Z %C',
     'FI' => '%O%n%N%n%A%nFI-%Z %C',
     'FJ' => '',
     'FK' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'FM' => '%N%n%O%n%A%n%C %S %Z',
     'FO' => '%N%n%O%n%A%nFO%Z %C',
     'FR' => '%O%n%N%n%A%n%Z %C %X',
     'GA' => '',
     'GB' => '%N%n%O%n%A%n%C%n%S%n%Z',
     'GD' => '',
     'GE' => '%N%n%O%n%A%n%Z %C',
     'GF' => '%O%n%N%n%A%n%Z %C %X',
     'GG' => '%N%n%O%n%A%n%X%n%C%nGUERNSEY%n%Z',
     'GH' => '',
     'GI' => '%N%n%O%n%A',
     'GL' => '%N%n%O%n%A%n%Z %C',
     'GM' => '',
     'GN' => '%N%n%O%n%Z %A %C',
     'GP' => '%O%n%N%n%A%n%Z %C %X',
     'GQ' => '',
     'GR' => '%N%n%O%n%A%n%Z %C',
     'GS' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'GT' => '%N%n%O%n%A%n%Z- %C',
     'GU' => '%N%n%O%n%A%n%C %S %Z',
     'GW' => '%N%n%O%n%A%n%Z %C',
     'GY' => '',
     'HK' => '%S%n%A%n%O%n%N',
     'HM' => '%O%n%N%n%A%n%C %S %Z',
     'HN' => '%N%n%O%n%A%n%C, %S%n%Z',
     'HR' => '%N%n%O%n%A%nHR-%Z %C',
     'HT' => '%N%n%O%n%A%nHT%Z %C %X',
     'HU' => '%N%n%O%n%C%n%A%n%Z',
     'ID' => '%N%n%O%n%A%n%C %Z%n%S',
     'IE' => '%N%n%O%n%A%n%C%n%S',
     'IL' => '%N%n%O%n%A%n%C %Z',
     'IM' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'IN' => '%N%n%O%n%A%n%C %Z%n%S',
     'IO' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'IQ' => '%O%n%N%n%A%n%C, %S%n%Z',
     'IS' => '%N%n%O%n%A%n%Z %C',
     'IT' => '%N%n%O%n%A%n%Z %C %S',
     'JE' => '%N%n%O%n%A%n%X%n%C%nJERSEY%n%Z',
     'JM' => '%N%n%O%n%A%n%C%n%S %X',
     'JO' => '%N%n%O%n%A%n%C %Z',
     'JP' => '〒%Z%n%S%C%n%A%n%O%n%N',
     'KE' => '%N%n%O%n%A%n%C%n%Z',
     'KG' => '%Z %C %X%n%A%n%O%n%N',
     'KH' => '%N%n%O%n%A%n%C %Z',
     'KI' => '%N%n%O%n%A%n%S%n%C',
     'KM' => '',
     'KN' => '%N%n%O%n%A%n%C, %S',
     'KR' => '%S %C%D%n%A%n%O%n%N%nSEOUL %Z',
     'KW' => '%N%n%O%n%A%n%Z %C',
     'KY' => '%N%n%O%n%A%n%S',
     'KZ' => '%Z%n%S%n%C%n%A%n%O%n%N',
     'LA' => '%N%n%O%n%A%n%Z %C',
     'LB' => '%N%n%O%n%A%n%C %Z',
     'LC' => '',
     'LI' => '%O%n%N%n%A%nFL-%Z %C',
     'LK' => '%N%n%O%n%A%n%C%n%Z',
     'LR' => '%N%n%O%n%A%n%Z %C %X',
     'LS' => '%N%n%O%n%A%n%C %Z',
     'LT' => '%O%n%N%n%A%nLT-%Z %C',
     'LU' => '%O%n%N%n%A%nL-%Z %C',
     'LV' => '%N%n%O%n%A%n%C, %Z',
     'LY' => '',
     'MA' => '%N%n%O%n%A%n%Z %C',
     'MC' => '%N%n%O%n%A%nMC-%Z %C %X',
     'MD' => '%N%n%O%n%A%nMD-%Z %C',
     'ME' => '%N%n%O%n%A%n%Z %C',
     'MF' => '%O%n%N%n%A%n%Z %C %X',
     'MG' => '%N%n%O%n%A%n%Z %C',
     'MH' => '%N%n%O%n%A%n%C %S %Z',
     'MK' => '%N%n%O%n%A%n%Z %C',
     'ML' => '',
     'MN' => '%N%n%O%n%A%n%S %C-%X%n%Z',
     'MO' => '%A%n%O%n%N',
     'MP' => '%N%n%O%n%A%n%C %S %Z',
     'MQ' => '%O%n%N%n%A%n%Z %C %X',
     'MR' => '',
     'MS' => '',
     'MT' => '%N%n%O%n%A%n%C %Z',
     'MU' => '%N%n%O%n%A%n%Z%n%C',
     'MV' => '%N%n%O%n%A%n%C %Z',
     'MW' => '%N%n%O%n%A%n%C %X',
     'MX' => '%N%n%O%n%A%n%Z %C, %S',
     'MY' => '%N%n%O%n%A%n%Z %C, %S',
     'MZ' => '%N%n%O%n%A%n%C',
     'NA' => '',
     'NC' => '%O%n%N%n%A%n%Z %C %X',
     'NE' => '%N%n%O%n%A%n%Z %C',
     'NF' => '%O%n%N%n%A%n%C %S %Z',
     'NG' => '%N%n%O%n%A%n%C %Z%n%S',
     'NI' => '%N%n%O%n%A%n%Z%n%C, %S',
     'NL' => '%O%n%N%n%A%n%Z %C',
     'NO' => '%N%n%O%n%A%n%Z %C',
     'NP' => '%N%n%O%n%A%n%C %Z',
     'NR' => '%N%n%O%n%A%n%S',
     'NU' => '',
     'NZ' => '%N%n%O%n%A%n%C %Z',
     'OM' => '%N%n%O%n%A%n%Z%n%C',
     'PA' => '%N%n%O%n%A%n%C%n%S',
     'PE' => '',
     'PF' => '%N%n%O%n%A%n%Z %C %S',
     'PG' => '%N%n%O%n%A%n%C %Z %S',
     'PH' => '%N%n%O%n%A%n%Z %C%n%S',
     'PK' => '%N%n%O%n%A%n%C-%Z',
     'PL' => '%N%n%O%n%A%n%Z %C',
     'PM' => '%O%n%N%n%A%n%Z %C %X',
     'PN' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'PR' => '%N%n%O%n%A%n%C PR %Z',
     'PS' => '',
     'PT' => '%N%n%O%n%A%n%Z %C',
     'PW' => '%N%n%O%n%A%n%C %S %Z',
     'PY' => '%N%n%O%n%A%n%Z %C',
     'QA' => '',
     'RE' => '%O%n%N%n%A%n%Z %C %X',
     'RO' => '%N%n%O%n%A%n%Z %C',
     'RS' => '%N%n%O%n%A%n%Z %C',
     'RU' => '%Z %C  %n%A%n%O%n%N',
     'RW' => '',
     'SA' => '%N%n%O%n%A%n%C %Z',
     'SB' => '',
     'SC' => '%N%n%O%n%A%n%C%n%S',
     'SE' => '%O%n%N%n%A%nSE-%Z %C',
     'SG' => '%N%n%O%n%A%nSINGAPORE %Z',
     'SH' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'SI' => '%N%n%O%n%A%nSI- %Z %C',
     'SJ' => '%N%n%O%n%A%n%Z %C',
     'SK' => '%N%n%O%n%A%n%Z %C',
     'SL' => '',
     'SM' => '%N%n%O%n%A%n%Z %C',
     'SN' => '%N%n%O%n%A%n%Z %C',
     'SO' => '%N%n%O%n%A%n%C, %S %Z',
     'SR' => '%N%n%O%n%A%n%C %X%n%S',
     'ST' => '%N%n%O%n%A%n%C %X',
     'SV' => '%N%n%O%n%A%n%Z-%C%n%S',
     'SZ' => '%N%n%O%n%A%n%C%n%Z',
     'TA' => '',
     'TC' => '%N%n%O%n%A%n%X%n%C%n%Z',
     'TD' => '',
     'TF' => '',
     'TG' => '',
     'TH' => '%N%n%O%n%A%n%C%n%S %Z',
     'TJ' => '%N%n%O%n%A%n%Z %C',
     'TK' => '',
     'TL' => '',
     'TM' => '%N%n%O%n%A%n%Z %C',
     'TN' => '%N%n%O%n%A%n%Z %C',
     'TO' => '',
     'TR' => '%N%n%O%n%A%n%Z %C',
     'TT' => '',
     'TV' => '%N%n%O%n%A%n%X%n%C%n%S',
     'TW' => '%Z%n%S%C%n%A%n%O%n%N',
     'TZ' => '',
     'UA' => '%Z %C%n%A%n%O%n%N',
     'UG' => '',
     'UM' => '%N%n%O%n%A%n%C %S %Z',
     'US' => '%N%n%O%n%A%n%C %S %Z',
     'UY' => '%N%n%O%n%A%n%Z %C %S',
     'UZ' => '%N%n%O%n%A%n%Z %C%n%S',
     'VA' => '%N%n%O%n%A%n%Z %C',
     'VC' => '',
     'VE' => '%N%n%O%n%A%n%C %Z, %S',
     'VG' => '',
     'VI' => '%N%n%O%n%A%n%C %S %Z',
     'VN' => '%N%n%O%n%A%n%C%n%S',
     'VU' => '',
     'WF' => '%O%n%N%n%A%n%Z %C %X',
     'WS' => '',
     'YE' => '',
     'YT' => '%O%n%N%n%A%n%Z %C %X',
     'YU' => '%N%n%O%n%A%n%Z %C',
     'ZA' => '%N%n%O%n%A%n%C%n%Z',
     'ZM' => '%N%n%O%n%A%n%Z %C',
     'ZW' => '',
);
