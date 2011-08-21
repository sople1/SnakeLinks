<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief template lib file.
 *
 **/
if (!__SLK__) exit();

/**
 *
 * @brief load template file..
 * @param string $page, string $module, object $args.
 * @return string.
 *
 **/
function loadTpl($page, $module, $args=null)
{
    global $SLK;
    
    $res = file($SLK[module]."/".$module."/tpl/".$page.".html", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($res as $v) {
        if ($args->data) {
            $v = preg_replace(array_keys($args->data), array_values($args->data), $v);
        }
        $tpl .= $v;
    }
    return $tpl;
}

/**
 *
 * @brief load skin file.
 * @param string $page, string $module.
 * @return string.
 *
 **/
function loadSkin($page, $module)
{
    $tpl = file($SLK[module]."/".$module."/skin/".$page.".html", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    return $tpl;
}

/**
 *
 * @brief make page.
 * @param string $module, string $viewpage, object $args.
 * @return string.
 *
 **/
function makepage($module, $viewpage, $args)
{
    global $cfg;
    
    $oModule = &loadModule($module, "view");
    if ($oModule) {
        if (!is_callable(array($oModule,$viewpage))) {
            $viewpage = $cfg->default["viewPage"]; 
        }
    }
    else {
        $oModule = &loadModule($cfg->default["module"], "view");
        $viewpage = $cfg->default["viewPage"];
    }   
    $page = $oModule->$viewpage();
    
    return $page;
}

/**
 *
 * @brief print page.
 * @param object $args.
 * @return bool.
 *
 **/
function printpage($args=null)
{
    global $SLK, $cfg, $req;
    
    if ($req[m]) {
        $module = $req[m];
    }
    else {
        $module = $cfg->default["module"];
    }
    
    if ($req[v]) {
        $viewpage = $req[v];
    }
    else {
        $viewpage = $cfg->default["viewPage"];
    }
    
    $page = makePage($module, $viewpage, $args);
    echo $page;
    return 1;
}

?>