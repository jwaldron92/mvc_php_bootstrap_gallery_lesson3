<?php
/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 4:20 PM
 *
 * just a safety net
 */
/**
 * scans the User class to make sure is declared
 */
function __autoload($class){
    $class = strtolower($class );
    $the_path = "includes/{$class}.php";

    if(file_exists($the_path)) {

        require_once($the_path);
    } else{
        die("The file name {$class}.php was not man...");

    }


}

function redirect($location){

    header("Location: {$location}");
}