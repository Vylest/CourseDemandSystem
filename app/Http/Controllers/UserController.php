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
        Auth::logout();
        return redirect('auth.login')->with('message', 'Successfully Logged Out!');
    }

    public function editAccount($id)
    {
        $user = User::findOrFail($id);
        return view('user.editAccount', compact('user'));
    }

    public function manageAccount($id)
    {
        $user = User::findOrFail($id);
        return view('user.account', compact('user'));
    }

    public function changePassword($id)
    {
        $user = User::findOrFail($id);
        return view('user.password', compact('user'));
    }

    public function changeAccountPassword($id)
    {
        $user = User::findOrFail($id);
        return view('user.accountPassword', compact('user'));
    }

    public function updatePassword($user_id, Requests\PasswordRequest $request)
    {
        $user = User::findOrFail($user_id);
        $old_password   = Input::get('old_password');
        if (Hash::check($old_password, Auth::user()->password)) {
            $user->password = bcrypt($request->password);
            $user->update();
            return redirect()->route('user.account', [$user->id])->with('success', true)->with('message', 'Password updated.');
        } else {
            return Redirect::back()->withErrors('Password incorrect');
        }
    }

    public function updateAccount($id, Requests\AccountRequest $request)
    {
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->update();
        return redirect()->route('user.account', [$user->id])->with('message', 'User updated successfully.');
    }


}
