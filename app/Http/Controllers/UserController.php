<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    function usersList() {
        return view('admin.users');
    }

    function usersPostAction() {
        return view('admin.users');
    }

    function userNew() {
        return view('admin.new-user');
    }
}
