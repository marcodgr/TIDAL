<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$user='postgres';
$pass='1234567890';
$dbh = new PDO('pgsql:host=localhost;dbname=tidal', $user, $pass);
