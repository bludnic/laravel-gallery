<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as ImageResizer;
use Gate;
use App\Category;
use App\Image;
use App\Comment;

class ImageController extends Controller {
  public function __construct() {
    $this->middleware('auth', [
      'only' => [
        'renderMyImagesPage',
        'renderImageForm',
        'create',
        'update',
        'delete'
      ]
    ]);

    $this->middleware('notBlocked', [
      'only' => [
        'renderMyImagesPage',
        'renderImageForm',
        'create',
        'update',
        'delete'
      ]
    ]);
  }

  public function index() {
    return $this->renderImagesPage();
  }

  public function renderImagePage($id) {
    $image = Image::findOrFail($id);

    $data = [
      'image' => $image,
      'comments' => Comment::with('user')->where('image_id', $id)->get()
    ];

    return view('pages.image', $data);
  }

  public function renderImagesPage() {
    $images = Image::publicOrOwn();

    return view('pages.home', [
      'images' => $images
    ]);
  }

  public function renderMyImagesPage() {
    $images = Image::where('user_id', Auth::user()->id)->get();

    return view('pages.home', [
      'images' => $images
    ]);
  }

  public function renderImagesByCategoryPage($id) {
    $images = Image::where('category_id', $id)->get();

    return view('pages.home', [
      'images' => $images
    ]);
  }

  public function renderImageForm() {
    return view('pages.image-new');
  }

  public function create(Request $request) {
    $this->validate($request, [
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=640,min_height=360',
      'description' => 'required|max:255',
      'category_id' => 'required|exists:categories,id',
      'user_id' => 'exists:users,id'
    ]);

    $fileName = $this->_saveImage();

    $private = $request->get('private') == 'on' ? 1 : 0;
    $image = Image::create([
      'name' => $fileName,
      'description' => $request->get('description'),
      'private' => $private,
      'category_id' => $request->get('category_id'),
      'user_id' => Auth::user()->id
    ]);

    return redirect('/image/' . $image['id']);
  }

  public function delete(Request $request, $id) {
    $image = Image::findOrFail($id);

    $this->authorize('delete', $image);

    Image::destroy($id);

    return redirect('/');
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
