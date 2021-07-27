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
}
