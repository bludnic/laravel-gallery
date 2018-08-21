<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
  public $categories = [
    [
      'id' => 1,
      'name' => 'Vue'
    ],
    [
      'id' => 2,
      'name' => 'Angular'
    ],
    [
      'id' => 3,
      'name' => 'React'
    ],
    [
      'id' => 4,
      'name' => 'Polymer'
    ],
    [
      'id' => 5,
      'name' => 'Ember'
    ],
    [
      'id' => 6,
      'name' => 'Meteor'
    ]
  ];

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('categories')->delete();

    foreach ($this->categories as $category) {
      DB::table('categories')->insert($category);
    }
  }
}
