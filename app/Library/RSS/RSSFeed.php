<?php

namespace App\Library\RSS;

use App\Library\Verdant\Array2XML;
use App\Library\Verdant\XML2Array;

class RSSFeed
{
    public function displayXMLStructure($xml)
    {
        $file = '<pre>';
        $file .= htmlentities($xml);
        $file .= '</pre>';
        return $file;
    }

    public function convertArrayToXML(array $array, $root_node = 'root')
    {
        $xml = Array2XML::createXML($root_node, $array[0]);
        return $this->displayXMLStructure($xml->saveXML());
    }

    public function convertXMLToArray(array $xml)
    {
        $array = XML2Array::createArray($xml);
        return $array;
    }
}

