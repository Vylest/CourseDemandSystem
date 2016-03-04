<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('admin', ['only'=>['create','edit','update','destroy','store']]);
//    }

    public function index() {
        $loggedInUser = Auth::user();
        $users = User::all();

           return view('user.index', compact('users'));
    }

    public function show($id) {
        $user = User::where('id', $id)->get();
        return view('user.show', compact('user'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Requests\UserCreateRequest $request) {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();
        return redirect()->route('users.index')->with('message', 'Your user was created.');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update($id, Requests\UserEditRequest $request) {
        $user = User::findOrFail($id);

        if($request->password == $request->password_confirmation) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = $request->type;
            $user->update();
            return redirect()->route('users.index')->with('message', 'User updated successfully.');
        } else {
            return redirect()->back()->withErrors('Password does not match the confirmation');
}
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        if($user->delete()) {
            return redirect()->route('users.index')->with('message', 'User Deleted!');
        } else {
            return redirect()->back()->withErrors(['error', 'Account Deletion Failed!']);
        }
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
        dd('sdf');
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
