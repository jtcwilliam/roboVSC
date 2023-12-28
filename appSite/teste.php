<?php

function print_obj($obj = null)
{

    echo '<pre>';
    print_r($obj);
    echo '</pre>';
}

function getValue($els = null)
{
    if (is_null($els)) {
        return 0;
    } else {
        foreach ($els as   $el) {

            print_obj($el);

            foreach ($el->nodeValue as   $nd) {

                
            }
        }
    }
}


$content  = file_get_contents('https://vermilionil.devnetwedge.com/parcel/view/0112300022/2023');
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($content);

$xp = new DOMXPath($dom);
$els = $xp->query("//*[@id='parcel-views']");

echo getValue($els);
