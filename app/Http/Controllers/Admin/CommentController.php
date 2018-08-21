<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Image;
use App\User;

class CommentController extends Controller {
  public function index() {
    $comments = Comment::with(['user'])->get();

    return view('admin.pages.comments', [
      'comments' => $comments
    ]);
  }

  public function new() {
    $images = Image::all();
    $users = User::all();

    return view('admin.pages.comment-new', [
      'images' => $images,
      'users' => $users
    ]);
  }

  public function edit($id) {
    $comment = Comment::findOrFail($id);
    $images = Image::all();
    $users = User::all();

    return view('admin.pages.comment-edit', [
      'comment' => $comment,
      'images' => $images,
      'users' => $users
    ]);
  }

  public function create(Request $request) {
    $this->validate($request, [
      'text' => 'required|max:255',
      'image_id' => 'required|exists:images,id',
      'user_id' => 'required|exists:users,id'
    ]);

    $comment = Comment::create([
      'text' => $request->get('text'),
      'image_id' => $request->get('image_id'),
      'user_id' => $request->get('user_id')
    ]);

    return redirect('/admin/comments');
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'text' => 'required|max:255',
      'image_id' => 'required|exists:images,id',
      'user_id' => 'required|exists:users,id'
    ]);

    $comment = Comment::findOrFail($id);
    $comment->text = $request->get('text');
    $comment->image_id = $request->get('image_id');
    $comment->user_id = $request->get('user_id');
    $comment->update();

    return redirect()->back();
  }

  public function delete($id) {
    $comment = Comment::findOrFail($id);

    Comment::destroy($id);

    return redirect()->back();
  }
}
