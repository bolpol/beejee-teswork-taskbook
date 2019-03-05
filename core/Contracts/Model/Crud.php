<?php
/**
 * Created by PhpStorm.
 * User: pirno
 * Date: 3/3/2019
 * Time: 5:36 PM
 */

namespace Core\Contracts\Model;


interface Crud
{
    public function create();
    public function read();
    public function update();
    public function delete();
}