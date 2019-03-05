<?php

namespace Core\Model;

use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

/**
 * Model parent
 */
abstract class BaseModel extends Model
{
    public $timestamps = false;

    protected static $eloquent_constructor;

    public function __construct()
    {
        self::$eloquent_constructor = parent::__construct();
        self::$eloquent_constructor;
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => env('DBDRIVER'),
            'host'      => env('DBHOST'),
            'database'  => env('DBNAME'),
            'username'  => env('DBUSER'),
            'password'  => env('DBPASS'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->bootEloquent();
    }

}
