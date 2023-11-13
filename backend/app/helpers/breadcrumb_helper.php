<?php

function breadcrumb(){
    $url = $_SERVER['REQUEST_URI'];
    $mainUrl = explode('?', $url)[0];
    $d = explode('/',ltrim($mainUrl, '/'));
    return (object)['page' => $d[1] ? $d[1] : 'dashboard', 'controller' => isset($d[2]) ? $d[2] : ''];
}
