<?php

function makeURL($url, $name = NULL, $where = NULL, $del = FALSE, $old = FALSE, $delname = FALSE) {
    if ($del) {
        $url = array();
    }
//    if ($delname) {
//        $parsedUrl = parse_url($url);
//        $query = array();
//
//        if (isset($parsedUrl['query'])) {
//            parse_str($parsedUrl['query'], $query);
//            unset($query[$varname]);
//        }
//
//        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
//        $query = !empty($query) ? '?' . http_build_query($query) : '';
//
//        return $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $path . $query;
//    } else {
    $link = '?';
    $url[$name] = $where;
    foreach ($url as $key => $value) {
        $link .= $key . "=" . $value . "&";
    } if ($old) {
        echo substr($link, 0, strlen($link) - 3);
    } else {
        echo substr($link, 0, strlen($link) - 1);
    }
}

//}

/*
  Ošetření vstupních superglobálních proměnných
 */

function secure(&$val) {
    /*
      Funkce pro rekurzivní ošetření hodnot i klíčů metodou htmlspecialchars
     * &$val reference na hodnotu
     */
    if (is_array($val)) {  //zjistí zda $val je pole
        $keys = array_keys($val);   //načte všechny klíče tohoto pole
        foreach ($keys As $key) {  //projde celé pole
            $value = secure($val[$key]); //pokračuje v rekurzi
            unset($val[$key]); //smaže původní klíč
            $val[htmlspecialchars($key)] = $value; //vytvoří prvek s ošetřeným klíčem i hodnotou v původním poli                 
        }
    } else
        $val = htmlspecialchars($val);  //pokud $val není pole pouze ošetří hodnotu    

    return $val; // vrací $val, nutné pro rekurzi
}

function fixSuperglobals() {
    /*
      Ošetří superglobální proměnné proti XSS
     */
    $superglobals = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);  //pole vstupních superglobálních proměnných
    foreach ($superglobals As &$process) {  //projde pole  
        secure($process);  //provede rekurzivní ošetření
    }
//odstranění zbytečných proměnných
    unset($process);
    unset($superglobals);
}

//  fixSuperglobals();   //zavoláme funkci, která nám ošetří všechny vstupní superglobální proměnné

/*
  Nyní jsou superglobální proměnné ošetřené proti Cross-site scripting.
 */
function dateFormat($date) {
    $day = substr($date, 8, 2);
    $month = substr($date, 5, 2);
    $year = substr($date, 0, 4);
    echo $day . "." . $month . "." . $year;
}
