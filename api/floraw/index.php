<?php
/**
 *
 * SnakeLinks 0.1.201108120910
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief floraw 연결용 api
 **/

/**
 * @brief 하위페이지 임의실행 방지 변수
 **/
if (!__SLK__) {
    define('__SLK__', true);
}

/**
 * @brief API 변수 선언
 **/
$API[base] = $_SERVER[DOCUMENT_ROOT]."/api/floraw";
include ($_SERVER[DOCUMENT_ROOT]."/snakelinks/common.php");
require_once($SLK['config']."/config.default.php");

#플로라w 페이지에서 보내온 정보를 처리측 프로그램으로 발송
#http://www.floraw.com/bbs/board.php?bo_table=TABLE&wr_id=DOC_ID
#Request로 받는 데이터: table, doc_id, apikey, userno/userid(선택)
include_once ($API[base]."/floraw.class.php");
$oModule = new florawApi();
$res = $oModule->getRes();
//var_export($res);

#되돌려 보여줄 페이지.
if ($res->data) {
    #리턴 형식용 템플릿 가져옴
    $page = file($API[base]."/tpl/callback.".$res->type, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    #리턴 형식에서 필드 정리.
    $i = 0;
    foreach($res->data as $k=>$v) {
        $arr_key[$i] = "/#--".$k."--#/";
        $arr_val[$i] = $v;
        $i++;
    }
    #리턴 형식에 값 대입
    foreach($page as $v) {
        if ($res->data) {
            $v = preg_replace($arr_key, $arr_val, $v);
        }
        $tpl .= $v."\n";
    }
    #리턴 형식 출력
    echo $tpl;
}
else {// if code 로 합쳐도 될 것 같지만.
/**
 * @brief 아무것도 없을 때에는 강제로 xml
 **/
    if (!$res->type) {
        $res->type = "xml";
    }

    #리턴 형식용 템플릿 가져옴
    $page = file($API[base]."/tpl/error_callback.".$res->type, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    #리턴 형식에 값 대입
    foreach($page as $v) {
        $tpl .= $v."\n";
    }
    #리턴 형식 출력
    echo $tpl;
}


if ($res->debug=="slk") {// debug
    echo ("<!--\n");
    var_export($res);
    echo ("\n");
    var_export($param);
    echo ("\n");
    $oCodeModel = loadModule("code", "model");
    var_export($oCodeModel->getCode("30","4"));
    echo ("\n");
    var_export($oCodeModel->getCode("6","3"));
    echo ("\n-->");
}

?>