<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Util;

/**
 * Description of Util
 *
 * @author kulturman
 */
class Util {
    public static $PROFESSOR_ID = 10;
    public static $STUDENT_ID = 8;
    public static $AMIN_ID = 11;
    public static function uploadDocument($document, $path = null) {
        if ($document->isValid()) {
            if ($path == null) {
                $path = config('uploads.documents_path');
            }

            $ext = $document->getClientOriginalExtension();

            do {
                $name = str_random(30) . '.' . $ext;
            } while (file_exists($path . '/' . $name));

            if ($document->move($path, $name)) {
                return $path . '/' . $name;
            }
        }

        return null;
    }
    
    public static function setStatus($user) {
        session(['user' => $user]);
        session(['role' => str_slug($user->role->label)]);
        session(['role_id' => $user->role_id]);
    }
    
    public static function removeStatus() {
        session(['user' => null]);
        session(['role' => null]);
        session(['role_id' => null]);
    }

}
