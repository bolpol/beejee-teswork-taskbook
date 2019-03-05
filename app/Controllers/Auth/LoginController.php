<?php
/**
 * Created by PhpStorm.
 * User: pirno
 * Date: 3/2/2019
 * Time: 11:41 PM
 */

namespace App\Controllers\Auth;


use App\Controllers\UserController;
use App\Models\User;
use Core\Routing\Router;

//use flight\template\View;

class LoginController extends UserController
{

    public function index():void
    {
        $this->view('auth/login/index', [
        ]);
    }


    public function login()
    {
        $req = Router::request();
        $req->query->email;
        $req->query->psw;
//var_dump($req->query->email);
        $user = User::where('email', htmlspecialchars(trim($req->query->email)))->first();
        //var_dump(User::where('email', htmlspecialchars(trim($req->query->email)))); //exit;
        if(is_null($user))
        {
            $this->view('auth/login/index', [
                '_alert' => 'alert alert-danger',
                '_error' => 'User with this mail not found'
            ]);
        }
        if($this->checkPassword(htmlspecialchars(trim($req->query->psw)), $user->password))
        {
            $token = hash('sha512', $user->name . $req->query->email . env('APP_TOKEN') . time());

            $_SESSION['id'] = $user->id;
            $_SESSION['auth_token'] = $token;

            $user->auth_token = $token;
            $user->update();

            var_dump($_SESSION);
            var_dump("User authorised, token: " . $token);
            var_dump($_SERVER);
            Router::redirect('http://'.$_SERVER['HTTP_HOST'].'/www'.'/test/user/');
        }
        else
        {
            $this->view('auth/login/index', [
                '_alert' => 'alert alert-danger',
                '_error' => 'Not correct password'
            ]);
        }

    }

    protected function checkPassword($password, $known_hash)
    {
        return hash_equals($known_hash, hash('sha512', htmlspecialchars(trim($password))));
    }

}