<?php
/**
 * Created by PhpStorm.
 * User: pirno
 * Date: 3/2/2019
 * Time: 10:12 PM
 */

namespace Core\Validator;

use Core\Routing\Router;

class RequestValidator
{
    private $request;

    public function __construct()
    {
        $this->request = Router::request();
    }

    public static function require($data)
    {
        if(!isset($data) && empty($data)) return new \ErrorException("needed field is empty");
    }


}