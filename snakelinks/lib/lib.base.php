<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief base lib file.
 *
 **/
if (!__SLK__) exit();

/**
 *
 * @brief load module Temporary.
 * @param string $module_name, string $module_type.
 * @return object.
 *
 **/
function loadModule($module_name, $module_type="class")
{
    global $SLK;
    $module_type = us2cc($module_type);
    include_once($SLK[module]."/".$module_name."/".$module_name.".".$module_type.".php");
    if ($module_type=="class") {
        $module_type = "";
    }
    $module_key = us2cc($module_name."_".$module_type);
    $module = new $module_key;
    
    return $module;
}

/**
 *
 * @brief load requests.
 * @param string $key, string $key.
 * @return string.
 *
 **/
function loadReq($key=null, $type="request")
{
    eval("\$typename = &\$_".strtoupper($type).";");
    
    global $req;
    if ($key)
    {
        $req[$key] =  $typename[$key];
    }
    else
    {
        foreach($typename as $k => $v) {
            $req[$k] = $v;
        }
        return 1;
    }
    
}

/**
 *
 * @brief parse requests.
 * @param array $req.
 * @return null.
 *
 **/
function parseReq(&$req)
{
    global $SLK, $cfg, $API;

    if ($req[p]) {
        $SLK[mode]="proc";
    }
    else if ($API) {
        $SLK[mode]="api";
    }
    else {
        $SLK[mode]="view";
    }
    
    if ($req[k]) {
        $req[m] = "link";
        if (!($req[v]||$req[p])) {
            $req[v] = $cfg->default[linkmethod];
        }
    }
    
}

/**
 *
 * @brief call Page.
 * @param null.
 * @return null.
 *
 **/
function callPage()
{
    global $SLK, $req;
    
    loadReq();
    parseReq($req);

    if ($SLK[mode]=="view"){
        printPage();
    }
}

/**
 *
 * @brief underscore to CamelCase.
 *
 **/
function us2cc($str,$start=1) 
{
    // Split string in words.
    $words = explode('_', strtolower($str));
    
    $return = '';
    foreach ($words as $key => $word) {
        if ($key<=$start) $return .= trim($word);
        else $return .= ucfirst(trim($word));
    }
    
    return $return;
}


/**
 *
 * @brief make array for replace.
 * @param array $array.
 * @return array, array.
 *
 **/
function makeReplaceArray($array) 
{
    #리턴 형식에서 필드 정리.
    $i = 0;
    //var_export($array);
    foreach($array as $k=>$v) {
        $arr_key[$i] = "/#--".$k."--#/";
        $arr_val[$i] = $v;
        $i++;
    }
    
    return array($arr_key, $arr_val);
}

?>