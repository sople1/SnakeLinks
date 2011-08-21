<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief 기본 정보를 저장하는 config file.
 *
 **/
if (!__SLK__) exit();

//default var
$cfg->default = array(
                    //-- default title
                    "app_title" => "SnakeLinks",
                    "app_description" => "Open Source Short Link Manage Application",
                    "app_version" => "0.1.201108131100",
                    
                    //-- default module
                    "module" => "admin",
                    "viewPage" => "viewMain",
                    
                    //-- default link method
                    "linkmethod" => "jumpLink",
                    
                    //-- default link url
                    "linkurl" => "http://www.floraw.com",
                    
                    //-- default host url
                    "host" => "http://flr.kr/",
                );

//autoload config files.
foreach(scandir($SLK[config]) as $dirk => $dirv)
{
    if ($dirv != "."  && $dirv != ".." && $dirv != "config.default.php")
    { 
        include_once ($SLK[config]."/".$dirv);
    }
}

callPage();

?>