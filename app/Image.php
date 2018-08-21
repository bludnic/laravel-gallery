<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model {
  protected $fillable = ['description', 'name', 'private', 'user_id', 'category_id'];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public static function publicOrOwn() {
    if (Auth::check()) {
      $user = Auth::user();
      $userId = $user->id;
      $isAdmin = $user->type === 'superadmin';

      if($isAdmin) {
        return self::all();
      } else {
        $query = self::where(function ($query) use ($userId) { 
          $query
            ->where('private', '=', 0)
            ->orWhere('user_id', '=', $userId); 
        });
        return $query->get();
      }
    }

    return self::where('private', 0)->get();
  }
}
