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

        if ( !empty($xml->numbers->currencies->currency) ) {
            $currencies = $xml->numbers->currencies->currency;

            foreach($currencies as $c){

                $iso = $c['type'];
                $name_ = removeBrackets(mb_convert_case($c->displayName[0], MB_CASE_TITLE, "UTF-8"));
                $singular = removeBrackets(mb_convert_case($c->displayName[1], MB_CASE_TITLE, "UTF-8"));
                $plural = removeBrackets(mb_convert_case($c->displayName[2], MB_CASE_TITLE, "UTF-8"));

                if(empty($singular)){
                    $singular = $name_;
                }

                if(empty($plural)){
                    $plural = $singular;
                }

                $data[] = "\t\t'$iso'\t=>\t array\n\t\t(\n\t\t\t'name'\t=>\t\"$name_\",\n \t\t\t'one'\t=>\t\"$singular\",\n \t\t\t'many'\t=>\t\"$plural\"\n \t\t),\n";
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
 * A list of world\'s currency names in the current locale.
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

        $path = CURRENCY_DIR."{$language_code}/config.php";
        file_put_contents(CURRENCY_DIR."{$language_code}/config.php",$file);

        echo $path;
        echo PHP_EOL;

    }
}



function removeBrackets($string)
{
    $literal = '';
    if(strpos($string,' (')!==false)
    {
        $s = explode(' (',$string);
        $literal = $s[0];
    }
    elseif(strpos($string,'（')!==false)
    {
        $s = explode('（',$string);
        $literal = $s[0];
    }
    else
    {
        $literal = $string;
    }

    return (!empty($literal))? $literal : $string;
}