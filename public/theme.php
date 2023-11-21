<?php

$theme = "dark";
if( isset( $_POST["theme"] ) ) {
    $theme = $_POST["theme"];
    setcookie ( 'theme', $theme, strtotime( '+30 days' ), "/");
    header( "Location: /" );
}


?>