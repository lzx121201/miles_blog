<?php

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

    
}
