<?php
require_once 'Comment.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utility
 *
 * @author lizhengxing
 */
class Utility {
    static function formatDate($str,$f)
    {
        $date = date_create($str);
        return date_format($date,$f);
    }

    static function changeToHashTag($str)
    {
        //$arr = explode(",",$str);
        $arr = Utility::splitStringByDelimiter(",", $str);
        $harr = array();
        foreach($arr as $s)
        {
            array_push($harr,"#".$s);
        }        
        return $harr;
    }
    
    static function splitStringByDelimiter($d,$s)
    {
        $arr = explode($d,$s);
        if($arr[sizeof($arr)-1]=="")
        {
            $arr = array_slice($arr, 0,sizeof($arr)-1);
        }
        return $arr;
    }
    
    static function filterCommentByKeyword($arr,$kw)
    {
        $kws = Utility::splitStringByDelimiter(",", $kw);
        $filtered_arr = array();
        foreach($arr as $e)
        {
            foreach($kws as $k)
            {
                if(!(stripos($e->getComment(), $k) !== FALSE))
                {
                    array_push($filtered_arr, $e);
                }
            }
        }
        return $filtered_arr;
    }
    
    static function getFilteredComment($arr,$kw)
    {
        $kws = Utility::splitStringByDelimiter(",", $kw);
        $filtered_arr = array();
        foreach($arr as $e)
        {
            foreach($kws as $k)
            {
                if(stripos($e->getComment(), $k) !== FALSE)
                {
                    array_push($filtered_arr, $e);
                }
            }
        }
        return $filtered_arr;
    }
}
