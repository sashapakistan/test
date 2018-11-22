<?php

function delByValue(Array &$arr, $value){
    foreach(array_keys($arr, $value) as $key){
        unset($arr[$key]);
    }
}

function convertUrl($url, $rmValue){
    $parsedUrl = parse_url($url);
    $path = $parsedUrl['path'];
    parse_str($parsedUrl['query'], $params);
    delByValue($params, $rmValue);
    asort($params);
    $params['url'] = $path;
    $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . '/?' . http_build_query($params);
    echo $newUrl;
}

convertUrl('https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3', 3);
