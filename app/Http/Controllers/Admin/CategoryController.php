<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller {
  public function index() {
    $categories = Category::all();

    return view('admin.pages.categories', [
      'categories' => $categories
    ]);
  }

  public function new() {
    return view('admin.pages.category-new');
  }

  public function edit($id) {
    $category = Category::findOrFail($id);

    return view('admin.pages.category-edit', [
      'category' => $category
    ]);
  }

  public function create(Request $request) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);

    $category = Category::create([
      'name' => $request->get('name')
    ]);

    return redirect('/admin/categories');
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);

    $category = Category::findOrFail($id);
    $category->name = $request->get('name');
    $category->update();

    return redirect()->back();
  }

  public function delete($id) {
    $category = Category::findOrFail($id);

    Category::destroy($id);

    return redirect()->back();
  }
}
