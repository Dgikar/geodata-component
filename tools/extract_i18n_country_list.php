<?php
include 'config.php';

$dir = new \DirectoryIterator(DATA_DIR);

foreach ($dir as $fileinfo) {
    if ($fileinfo->isFile()) {
        $data = array();
        $language_code = basename($fileinfo->getFilename(),'.xml?format=txt');

        $parent = explode('_',$language_code);
        $parent = (!empty($parent[1])) ? "'{$parent[0]}'" : 'NULL';

        $xml = simplexml_load_file(DATA_DIR.$fileinfo->getFilename());

        if ( !empty($xml->localeDisplayNames->territories->territory) ) {
            $territories = $xml->localeDisplayNames->territories->territory ;
            $used = '';
            foreach ($territories as $name) {
                $iso = $name['type'];

                if (strlen($iso)==2) {
                    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
                    $data[] = "\t\t'$iso'\t=>\t\"$name\",";
                }

            }
        }

        $data = implode("\n",$data);

        $file='<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A list of countries in the current locale.
 */
return array
(
    \'parent\'    => '.$parent.',
    \'data\'      => array
    (
'.$data.'
    ),
);
';

        $path = COUNTRY_DIR."{$language_code}/config.php";
        file_put_contents(COUNTRY_DIR."{$language_code}/config.php",$file);

        echo $path;
        echo PHP_EOL;

    }
}
