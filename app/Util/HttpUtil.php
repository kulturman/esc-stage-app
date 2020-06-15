<?php
namespace App\Util;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author kulturman
 */
class HttpUtil {
    
    public static function sendResponse($success , $message = null , $reset = true
            , $url = null , $dialog = true , $data = null) {
        return response()->json([
            'success' =>$success , 'message' => $message , 'reset' => $reset,
            'reset' => $reset,  'url' => $url, 'data' =>$data, 'dialog' => $dialog
        ]);
    }
    
    public static function sendSuccessResponse($message , $reset = true
            , $url = null , $dialog = true , $data = null) {
        return self::sendResponse(true , $message , $reset, $url, $dialog, $data);
    }
    
    public static function sendSuccessDialogResponse($message, $reset = true, $url = null,
            $data = null) {
        return self::sendResponse(true , $message , $reset, $url, true , $data);
    }
    
    public static function sendSuccessNonDialogResponse($message, $reset = true, $url = null,
            $data = null) {
        return self::sendResponse(true , $message , $reset, $url, false , $data);
    }
    
    
}
