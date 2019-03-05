<?php

namespace App\Models;

use Core\Model\BaseModel as Model;
use Core\Session\Session;

/**
 * Model des articles
 */
class User extends Model
{
    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int [-1, 0, 1] - [not auth, user, admin]
     */
    public static function role()
    {
        if(0 === Session::id()) return -1;
        return User::find(Session::id())->first()->role;
    }
}
