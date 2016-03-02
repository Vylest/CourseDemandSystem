<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only'=>['create','edit','update','destroy','store']]);
    }

    public function index() {
        $loggedInUser = Auth::user();
        $loggedInUserId = $loggedInUser['id'];
        if (isset($loggedInUserId)) {
            $users = User::all();
            return view('user.index', compact(['user'], "loggedInUserId"));
        }
    }

    public function show($id) {
        $user = User::where('id', $id)->get();
        return view('user.show', compact('user'));
    }

    public function create() {
        return view('user.create');
    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }

    public function login() {
        return view('auth.login');
    }

    public function logout() {

    }
}
