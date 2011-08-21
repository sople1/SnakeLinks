<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief link model module file.
 *
 **/
 
class linkModel extends link
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
     * @brief get link resource. not redirect resource.
     * @param object $args.
     * @return object.
     *
     **/
    function getLinkRes($args)
    {
        global $cfg;
        
        if (!$args->url) {
            $output->code = "302";
            $output->msg = "default_redirect";
            $output->host = $cfg->default["host"];
            $output->key = "DEFAULT";
        }
        else {
            #정보가 존재하는가?
            $reqs->where = array ("url"=>$args->url);
            $oCon = loadModule("link","controller");
            $res = $oCon->loadRedirectData($reqs);
            #존재하지 않는다면 만들자
            if (!$res){
                $reqs->set = array ("url"=>$args->url, "register"=>$args->auth[idx]);
                $res = $oCon->regRedirectData($reqs);
            }
            #존재한다면 가져오자 
            $output->code = "200";
            $output->msg = "successed";
            $output->host = $cfg->default["host"];
            $output->key = $res[code];
        }
        
        return $output;
    }
    
    /**
     *
     * @brief get redirect resource.
     * @param object $args.
     * @return object.
     *
     **/
    function getRedirectRes($args=null)
    {
        global $cfg, $req;
        
        if (!$req[k]) {
            $req[k]="DEFAULT";
        }
        
        #정보가 존재하는가?
        $reqs->where = array ("code"=>$req[k]);
        $oCon = loadModule("link","controller");
        $res = $oCon->loadRedirectData($reqs);
        #존재하지 않는다면
        if (!$res){
            $output->data = array("url"=>$cfg->default[linkurl]);
        }
        #존재한다면 가져오자 
        $output->data = array("url"=>$res[url]);
        
        return $output;
    }
}
?>