<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Util;

/**
 * Description of StateUtil
 *
 * @author kulturman
 */
class StateUtil {
    
    public static $INIT_PHASE = 1;
    public static $FIRST_PART = 2;
    public static $SECOND_PART = 3;
    public static $THIRD_PART = 4;
    public static $FINAL_EDITION_PART = 5;
    public static $FINAL_PART = 6;
    
    public static function getLabel($state) {
        switch($state) {
            case self::$INIT_PHASE:
                return 'Rédaction du protocole';
            case self::$FIRST_PART:
                return 'Rédaction de la première partie';
            case self::$SECOND_PART:
                return 'Rédaction de la 2e partie';
            case self::$THIRD_PART:
                return 'Rédaction de la 3e partie';
            case self::$FINAL_EDITION_PART:
                return 'Mise en forme et correction final';
            case self::$FINAL_PART:
                return 'Dépôt du rapport final';
        }
    }
    
}
