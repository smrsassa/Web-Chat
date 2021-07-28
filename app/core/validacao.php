<?php

namespace phpWebChat;

class Validacao
{
    public static function email(String $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public static function imagem(Array $img)
    {
        $imgData = file_get_contents($img["tmp_name"]);
        $imgType = $img["type"];

        if ( (substr($imgType,0,5) == "image") == 1 ) {
            return $imgData;
        }

        return false;
    }
}
