<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
  protected $fillable = ['text', 'image_id', 'user_id'];

  /**
   * Get the user that wrote the comment.
   */
  public function user() {
    return $this->belongsTo('App\User');
  }

  public function image() {
    return $this->belongsTo('App\Image');
  }
}
