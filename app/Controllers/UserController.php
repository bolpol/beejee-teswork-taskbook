<?php
/**
 * Created by PhpStorm.
 * User: pirno
 * Date: 3/2/2019
 * Time: 11:40 PM
 */

namespace App\Controllers;


use App\Models\User;
use Core\Contracts\Model\Crud;
use Core\Controller\BaseController as Controller;
use Core\Paginator\Paginator;
use Core\Routing\Router;

class UserController extends Controller implements Crud
{
    //use Paginator;
    public function create()
    {
        $req=Router::request();
        $req->query->uname;
        $req->query->email;
        $req->query->psw;
    }

    public function read()
    {
        return User::all();
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function _paginate($page_num, $per_page, $order_by, $col)
    {
        if($page_num<1 or !is_int($page_num)) $page_num = 1;
        if($per_page>10 or $per_page<1 or !is_int($per_page)) $per_page = 5;
        if($order_by !== 'DESC' && $order_by !== 'ACS') $order_by='ASC';
        if(is_null($col) || empty($col)) $col='id';
        $response = User::where('id', '>', (($page_num * $per_page)-$per_page))
            ->orderBy($col, $order_by)
            ->limit($per_page)
            ->get();
        $this->view('task-book/index', [
            'baliseTitle' => 'Article listing title',
            'metaDescription' => 'Article listing desciption',
            'items' => $response,
        ]);
    }

    public function paginate()
    {
        $req=Router::request();
        $this->_paginate(
            $req->query->page_num,
            $req->query->per_page,
            $req->query->order,
            $req->query->col
        );
    }
}