<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(){
        echo 'index';
    }
    public function create(){
        echo 'create';
    }
    public function store(){
        echo 'store';
    }
    public function edit(){
        echo 'edit';
    }
    public function update(){
        echo 'update';
    }
    public function delete(){
        echo 'delete';
    }
}
