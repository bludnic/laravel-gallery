<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function create(Request $request, $id) {
    $this->authorize('create', Comment::class);

    $this->validate($request, [
      'text' => 'required|max:255'
    ]);

    $comment = Comment::create([
      'text' => $request->get('text'),
      'image_id' => $id,
      'user_id' => Auth::user()->id
    ]);

    return redirect()->back();
  }

  public function delete($id) {
    $comment = Comment::findOrFail($id);

    $this->authorize('delete', $comment);

    Comment::destroy($id);

    return redirect()->back();
  }
}
