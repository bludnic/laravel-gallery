<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {
  public $comments = [
    [
      'text' => 'Vue cool choice',
      'image_id' => 1,
      'user_id' => 1
    ],
    [
      'text' => 'awesome vue',
      'image_id' => 1,
      'user_id' => 2
    ],
    [
      'text' => 'I talk to a lot of JavaScript devs and I find it really interesting that the ones who spend the most time in Angular tend to not know JavaScript nearly as well. I don\'t want that to be me or our devs. Why should we write "not JavaScript?"',
      'image_id' => 1,
      'user_id' => 1
    ]
  ];

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('comments')->delete();

    foreach ($this->comments as $comment) {
      $dateNow = date('Y-m-d H:i:s');
      $comment['created_at'] = $dateNow;
      $comment['updated_at'] = $dateNow;

      DB::table('comments')->insert($comment);
    }
  }
}
