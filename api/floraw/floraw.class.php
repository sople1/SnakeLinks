<?php
/**
 *
 * SnakeLinks 0.1.201108120910
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief floraw api class.
 *
 **/
 
class florawApi
{

    /**
     *
     * @brief init module.
     * @params object $args.
     * @return null.
     *
     **/
    function init($args=null)
    {
    }
    
    /**
     *
     * @brief get Resource
     * @params object $args.
     * @return object.
     *
     **/
    function getRes($args=null)
    { 
        #param 정리
        $param = $this->getParam();
        #api key 확인
        $auth = $this->checkApiKey($param[apikey]);
        if (!$auth) {
            return $this->getFailRes($param);
        }
        
        #본프로그램으로 변수 전달
        $oLinkModel = loadModule("link", "model");
        $reqs->url = $this->makeLinkString($param);
        $reqs->auth = $auth;
        $reqs->param = $param;
        $res = $oLinkModel->getLinkRes($reqs);
        
        /*
        if ($param) {//테스트.
            $res->code = "200";
            $res->msg = "successed";
            $res->host = "http://flr.kr/";
            $res->key = "aaaa";
        }
        */
        
        #되돌아오면 값 정리
        $output->type = $param[type];
        $output->debug = $param[debug];
        $output->data = array(
            "code"=>$res->code,
            "msg"=>$res->msg,
            "host"=>$res->host,
            "key"=>$res->key
            );
        #되돌려주기
        return $output;
    }
    
    /**
     *
     * @brief get param
     * @params object $args.
     * @return array.
     *
     **/
    function getParam($args=null)
    {
        #param 정리
        foreach ($_REQUEST as $k=>$v) {
            $output[$k] = $v;
        }
        
        /**
         * @brief 아무것도 없을 때에는 강제로 xml
         **/
        if (!$output[type]) {
            $output[type] = "xml";
        }
        
        #되돌려주기
        return $output;
    }
    
    /**
     *
     * @brief check api key
     * @params string $key.
     * @return array.
     *
     **/
    function checkApiKey($key) {
        $oDB = loadModule("db");
        $oDB->connect();
        $query = "select * from `slk_register` where `key`='".$key."';";
        $res = $oDB->query($query);
        
        //var_export($query);
        //var_export($res);
        
        if ($res->errno=="0"){
            $oDBModel = loadModule("db", "model");
            $output = $oDBModel->res2NameArray($res->resource);
           // var_export($output);
        }
        else {
            $output = false;
        }
        
        $oDB->disconnect();
        unset($oDB);
        
        return $output;
    }
    
    /**
     *
     * @brief get fail resource
     * @params array $param.
     * @return object
     *
     **/
    function getFailRes($param) {
        $res->type = $param[type];
        $res->debug = $param[debug];
        
        $res->data[code] = "403";
        $res->data[msg] = "auth_fail";
        $res->data[host] = "";
        $res->data[key] = "";
        return $res;
    }
    
    /**
     *
     * @brief make link string
     * @params array $par.
     * @return string
     *
     **/
    function makeLinkString($par) {
        $output = "floraw|".$par[table]."|".$par[doc_id];
        
        return $output;
    }
}
?>