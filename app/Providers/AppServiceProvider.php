<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class AppServiceProvider extends ServiceProvider {
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    // Avoid missing migrations
    if (\Schema::hasTable('categories')) {
      view()->share('categories', Category::all());
      view()->share('pages', [
        [
          'name' => 'Categories',
          'uri' => '/admin/categories'
        ],
        [
          'name' => 'Images',
          'uri' => '/admin/images'
        ],
        [
          'name' => 'Comments',
          'uri' => '/admin/comments'
        ],
        [
          'name' => 'Users',
          'uri' => '/admin/users'
        ],
      ]);
    }
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {

  }
}
