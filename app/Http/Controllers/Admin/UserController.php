<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;

class UserController extends Controller {
  public function index() {
    $users = User::all();

    return view('admin.pages.users', [
      'users' => $users
    ]);
  }

  public function new() {
    return view('admin.pages.user-new');
  }

  public function edit($id) {
    $user = User::findOrFail($id);

    return view('admin.pages.user-edit', [
      'user' => $user
    ]);
  }

  public function create(Request $request) {
    $this->validate($request, [
      'name' => 'required|max:20',
      'email' => 'required|unique:users|email',
      'password' => 'required|confirmed|min:8|max:20'
    ]);

    $user = User::create([
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'password' => bcrypt($request->get('password'))
    ]);

    return redirect('/admin/users');
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required|max:20',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'confirmed|max:40',
    ]);

    $blockedOn = $request->get('blocked') == 'on' ? Carbon::now() : null;
    $user = User::findOrFail($id);
    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->blocked_on = $blockedOn;

    if (!empty($request->get('password'))) {
      $user->password = bcrypt($request->get('password'));
    }

    $user->update();

    return redirect()->back();
  }

  public function delete($id) {
    $user = User::findOrFail($id);

    User::destroy($id);

    return redirect()->back();
  }
}
