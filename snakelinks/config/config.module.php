<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief 모듈 정보를 저장하는 config file.
 *
 **/
if (!__SLK__) exit();

$cfg->modules = array();
//autoload module class file.
foreach(scandir($SLK[module]) as $dirk => $dirv)
{
    if ($dirv != "."  && $dirv != ".." && $dirv != ".DS_Store")
    { 
        include_once ($SLK[module]."/".$dirv."/".$dirv.".class.php");
        array_push($cfg->modules, $dirv);
        
    }
}

?>