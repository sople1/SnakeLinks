<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief 라이브러리 정보를 저장하는 config file.
 *
 **/
if (!__SLK__) exit();

//autoload library files.
foreach(scandir($SLK[lib]) as $dirk => $dirv)
{
    if ($dirv != "."  && $dirv != "..")
    { 
        include_once ($SLK[lib]."/".$dirv);
    }
}

?>