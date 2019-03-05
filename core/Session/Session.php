<?php
/**
 * Created by PhpStorm.
 * User: pirno
 * Date: 3/5/2019
 * Time: 10:40 AM
 */

namespace Core\Session;


class Session
{
    /**
     * @return int
     */
    public static function id():int
    {
        return (int) (!is_null($_SESSION['id']))?$_SESSION['id']:0;
    }

    /**
     * @return string
     */
    public static function token():string
    {
        return (string) $_SESSION['auth_token'];
    }
}