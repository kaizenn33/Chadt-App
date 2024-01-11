<?php

function config(){
    return new PDO("mysql:dbhost=localhost;dbname=chatapp", "root", "");
}