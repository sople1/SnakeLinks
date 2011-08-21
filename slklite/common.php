<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 **/
if (!__SLK__) exit();

$currentLocation = $_SERVER[DOCUMENT_ROOT]."slklite";

//set default value
$SLK = array(
            "root" => $currentLocation,
            "config" => $currentLocation."/config",
            "module" => $currentLocation."/module",
            "lib" => $currentLocation."/lib",
            "data" => $currentLocation."/data"
        );

?>