<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder {
  public $images = [
    // Vue
    [
      'name' => 'vue1.png',
      'description' => 'Already know HTML, CSS and JavaScript? Read the guide and start building things in no time!',
      'category_id' => 1,
      'user_id' => 1
    ],
    [
      'name' => 'vue2.png',
      'description' => 'An incrementally adoptable ecosystem that scales between a library and a full-featured framework.',
      'category_id' => 1,
      'user_id' => 1
    ],
    [
      'name' => 'vue3.png',
      'description' => '20KB min+gzip Runtime. Blazing Fast Virtual DOM. Minimal Optimization Efforts',
      'category_id' => 1,
      'user_id' => 1
    ],

    // Angular
    [
      'name' => 'ng1.png',
      'description' => 'Achieve the maximum speed possible on the Web Platform today, and take it further, via Web Workers and server-side rendering.',
      'category_id' => 2,
      'user_id' => 1
    ],
    [
      'name' => 'ng2.png',
      'description' => 'Angular puts you in control over scalability. Meet huge data requirements by building data models on RxJS, Immutable.js or another push-model.',
      'category_id' => 2,
      'user_id' => 1
    ],
    [
      'name' => 'ng3.png',
      'description' => 'Build features quickly with simple, declarative templates.',
      'category_id' => 2,
      'user_id' => 1
    ],

    // React
    [
      'name' => 'react1.png',
      'description' => 'Declarative views make your code more predictable and easier to debug.',
      'category_id' => 3,
      'user_id' => 1
    ],
    [
      'name' => 'react2.png',
      'description' => 'Build encapsulated components that manage their own state, then compose them to make complex UIs.',
      'category_id' => 3,
      'user_id' => 1
    ],
    [
      'name' => 'react3.png',
      'description' => 'Since component logic is written in JavaScript instead of templates, you can easily pass rich data through your app and keep state out of the DOM.',
      'category_id' => 3,
      'user_id' => 1
    ]
  ];

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('images')->delete();

    foreach ($this->images as $image) {
      $dateNow = date('Y-m-d H:i:s');
      $image['created_at'] = $dateNow;
      $image['updated_at'] = $dateNow;

      DB::table('images')->insert($image);
    }
  }
}
