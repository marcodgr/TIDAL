<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

unset($_SESSION["user_id"]);

// Inscription OK
header('Status: 301 Moved Permanently', false, 301);      
header("Location: /index.php");