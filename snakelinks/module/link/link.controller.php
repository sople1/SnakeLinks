<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief link controller module file.
 *
 **/
 
class linkController extends link
{

    /**
     *
     * @brief init module.
     * @param object $args.
     * @return null.
     *
     **/
    function init($args=null)
    {
    }
    
    /**
     *
     * @brief module.
     * @param object $args.
     * @return int.
     *
     **/
    function regRedirectData($args=null)
    {
        if (!$args->set[regdate]) {
            $args->set[regdate] = date("Y-m-d H:i:s");
        }
        if (!$args->set[code]) {
            $oCodeModel = loadModule("code", "model");
            $args->set[code] = $oCodeModel->getCode("6","3");
        }
        $oDBModel = loadModule("db", "model");
        $set = $oDBModel->makeSetString($args->set);
        
        $oDB = loadModule("db");
        $oDB->connect();
        $res = $oDB->query("insert into `slk_redirects`".$set.";");
        
        if ($res->errno=="0"){
            $output = $args->set;
        }
        else {
            $output = false;
        }
        
        $oDB->disconnect();
        unset($oDB);
        
        return $output;
    }
    
    function loadRedirectData($args) {
        $oDBModel = loadModule("db", "model");
        $field = $oDBModel->makeFieldString($args->field);
        $where = $oDBModel->makeWhereString($args->where);
        
        $oDB = loadModule("db");
        $oDB->connect();
        $query = "select ".$field." from `slk_redirects` where `code` is not null".$where.";";
        $res = $oDB->query($query);
        //var_export($query);
        //var_export($res);
        
        if ($res->errno=="0"){
            $output = $oDBModel->res2NameArray($res->resource);
        }
        else {
            $output = false;
        }
        
        $oDB->disconnect();
        unset($oDB);
        
        return $output;
    }
}
?>