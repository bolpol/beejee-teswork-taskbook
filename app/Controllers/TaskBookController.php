<?php

namespace App\Controllers;

use App\Models\TaskBook;
use App\Models\User;
use Core\Contracts\Model\Crud;
use Core\Controller\BaseController as Controller;
use Core\Routing\Router;
use Core\Validator\RequestValidator;


class TaskBookController extends Controller implements Crud
{
    private static $paginator;

    public function __construct()
    {
        parent::__construct();
        self::$paginator = new class() {

            public $default_page = 1;
            public $default_per_page = 3;
            public $default_order = 'ASC';
            public $default_row = 'id';

            public function show($per_page=null) {
                if(is_null($per_page)) $per_page =$this->default_per_page;
                $div = TaskBook::count()/$per_page;
                $pages = (is_float($div))?(int)$div+1:$div;
                return $pages;
            }
        };
    }

    /**
     * @param $page_num
     * @param $per_page
     * @param $order_by
     * @param $col
     * @return mixed
     */
    private function _paginate($page_num, $per_page, $order_by, $col)
    {
        if($page_num<1 or !is_int((int)$page_num))
            ///var_dump($page_num);
            $page_num = self::$paginator->default_page;
        if($per_page>10 or $per_page<1 or !is_int($per_page))
            $per_page = self::$paginator->default_per_page;
        if($order_by !== 'DESC' && $order_by !== 'ACS')
            $order_by = self::$paginator->default_order;
        if(is_null($col) || empty($col))
            $col = self::$paginator->default_row;
        return $response = TaskBook::where('id', '>', (($page_num * $per_page)-$per_page))
            ->orderBy($col, $order_by)
            ->limit($per_page)
            ->get();
    }

    /**
     * Listing des articles
     */
    public function index():void
    {
        $req=Router::request();
        $response = $this->_paginate(
            $req->query->id,
            $req->query->per_page,
            $req->query->order,
            $req->query->col
        );
        $this->view('task-book/index', [
            'baliseTitle' => 'Article listing title',
            'metaDescription' => 'Article listing desciption',
            'items' => $response,
            'paginator' => self::$paginator->show()
        ]);
    }

    /**
     *
     */
    public function new_page():void
    {
        $this->view('task-book/new', [
            'baliseTitle' => 'Article listing title',
            'metaDescription' => 'Article listing desciption'
        ]);
    }

    /**
     *
     */
    public function update_page():void
    {
        if(User::role() === 1) {
            $this->view('task-book/update', [
                'baliseTitle' => 'Article listing title',
                'metaDescription' => 'Article listing desciption'
            ]);
        } else {
            // send 403 error
            (new ErrorController())->_403();
        }
    }

    /**
     *
     */
    public function create()
    {
        $req=Router::request();
        RequestValidator::require($req->data->name);
        RequestValidator::require($req->data->email);
        RequestValidator::require($req->data->task);
        $task = new TaskBook();
        $task->name = $req->data->name;
        $task->email = $req->data->email;
        $task->task = $req->data->task;
        $task->status = 0;
        $task->save();
        $_POST = array();
        $this->new_page();
    }

    /**
     *
     */
    public function read()
    {
        // TODO: Implement read() method.
    }

    /**
     *
     */
    public function update()
    {
        $req=Router::request();
        if(User::role() === 1) {
            $task = TaskBook::where('id', $req->query->id)->first();
            $task->task = $req->data->task;
            $task->status = ($req->data->status === 'on')?1:0;
            $task->update();
            $_POST = array();
            $this->update_page();
        } else {
            // send 403 error
            (new ErrorController())->_403();
        }
    }

    /**
     *
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

}
