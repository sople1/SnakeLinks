<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief db class module file.
 * @brief it is based mysql 5.1.
 *
 **/
 
class db
{
    var $conn;
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
     * @brief connect db.
     * @param object $args.
     * @return object.
     *
     **/
    function connect($args=null)
    {
        global $cfg;
        $this->conn = mysql_connect($cfg->db['host'],$cfg->db['user'], $cfg->db['pwd']);
        if ($this->conn)
        {
            $rtn = mysql_select_db($cfg->db['dbname'], $this->conn);
            if (!$rtn)
            {
                mysql_set_charset($cfg->db['charset'],$this->conn);
                $result->error = mysql_error();
                $result->errno = mysql_errno();
            }
            else
            {
                $result->error = "successed";
                $result->errno = 0;
            }
        }
        else
        {
            $result->error = mysql_error();
            $result->errno = mysql_errno();
        } 
        
        return $result;
    }

    /**
     *
     * @brief query db.
     * @param string $sql, resource $conn.
     * @return object.
     *
     **/
    function query($sql, $conn=null)
    {
        if(!$conn) $conn = $this->conn;
        $rtn = mysql_query($query,$conn);
        if ($rtn)
        {
            $result->resource = $rtn;
            $result->error = "successed";
            $result->errno = 0;
        }
        else
        {
            $result->error = mysql_error();
            $result->errno = mysql_errno();
        }
        
        return $result;
    }

    /**
     *
     * @brief disconnect db.
     * @param resource $conn.
     * @return object.
     *
     **/
    function disconnect($conn=null)
    {
        if(!$conn) $conn = $this->conn;
        mysql_close($conn);
        $result->error = "successed";
        $result->errno = 0;
        
        return $result;
    }
    
}
?>