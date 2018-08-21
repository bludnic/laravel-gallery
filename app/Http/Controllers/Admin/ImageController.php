<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as ImageResizer;
use App\Http\Controllers\Controller;
use App\Image;
use App\User;

class ImageController extends Controller {
  public function index(Request $request) {
    $user_id = $request->input('user_id');
    $users = User::all();

    $images = [];
    if ($user_id) {
      $images = Image::with('user')->where('user_id', $user_id)->get();
    } else {
      $images = Image::with('user')->get();
    }

    return view('admin.pages.images', [
      'images' => $images,
      'users' => $users,
      'user_id' => $user_id
    ]);
  }

  public function new() {
    return view('admin.pages.image-new');
  }

  public function edit($id) {
    $image = Image::findOrFail($id);

    return view('admin.pages.image-edit', [
      'image' => $image
    ]);
  }

  public function create(Request $request) {
    $this->validate($request, [
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=640,min_height=360',
      'description' => 'required|max:255',
      'category_id' => 'required|exists:categories,id',
      'user_id' => 'exists:users,id'
    ]);

    // Save file to uploads/img
    $fileName = $this->_saveImage();

    // Save to db
    $private = $request->get('private') == 'on' ? 1 : 0;
    $image = Image::create([
      'name' => $fileName,
      'description' => $request->get('description'),
      'private' => $private,
      'category_id' => $request->get('category_id'),
      'user_id' => Auth::user()->id
    ]);

    return redirect('/admin/images');
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'description' => 'max:255',
      'category_id' => 'exists:categories,id',
      'user_id' => 'exists:users,id'
    ]);

    $image = Image::findOrFail($id);

    $private = $request->get('private') == 'on' ? 1 : 0;
    $image->private = $private;

    if ($image !== null) {
      $editableFields = ['description', 'category_id'];
      foreach ($editableFields as $field) {
        if ($value = $request->get($field)) {
          $image->{$field} = $value;
        }
      }

      $image->save();
      return redirect()->back();
    }
  }

  public function delete($id) {
    $image = Image::findOrFail($id);

    Image::destroy($id);

    return redirect()->back();
  }

  private function _saveImage() {
    $image = request()->file('image');
    $fileName = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();

    $imageResized = ImageResizer::make($image->getRealPath());
    $imageResized->fit(1920, 1080, function ($constraint) {
      $constraint->upsize();
    });
    $imageResized->save(public_path('uploads/img/' . $fileName));

    return $fileName;
  }
}
