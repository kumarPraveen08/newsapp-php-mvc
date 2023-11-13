<?php

function archivePrefix(){
    $url = $_SERVER['REQUEST_URI'];
    $mainUrl = explode('?', $url)[0];
    $d = explode('/',ltrim($mainUrl, '/'));
    if(isset($d[1]) && isset($d[2])){
        if($d[1] === 'archives'){
            if($d[2] === 'category'){
                return 'Category: ';
            }else if($d[2] === 'author'){
                return 'Author: ';
            }else if($d[2] === 'search'){
                return 'Search For: ';
            }
        }else{
            return;
        }
    }
}