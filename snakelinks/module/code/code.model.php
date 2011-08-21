<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief code model module file.
 *
 **/
 
class codeModel extends code
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
     * @brief get code.
     * @param int $length, int $strength.
     * @return string.
     *
     **/
    function getCode($length=6, $strength=1) {
        $source = "";
        switch ($strength) {
            case 4:
                $source .= "!@#$%^&*_-=+~";
            case 3:
                $source .= "1234567890";
            case 2:
                $source .= "QWERTYUIOPASDFGHJKLZXCVBNM";
            case 1:
                $source .= "qwertyuiopasdfghjklzxcvbnm";
        }
        
        $output = '';
        for ($i = 0; $i < $length; $i++) {
            $seed = $this->getSeed();
            mt_srand($seed);
            str_shuffle($source);
            $output .= $source[(mt_rand() % strlen($source))];
        }
        return $output;
    }
    
    
    /**
     *
     * @brief get seed.
     * @param none.
     * @return int.
     *
     **/
    function getSeed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }
    
}
?>