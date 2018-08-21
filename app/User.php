<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable {
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'blocked_on',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function isSuperAdmin() {
    return $this->type === 'superadmin';
  }

  public function isBlocked() {
    if ($this->blocked_on && Carbon::now() >= $this->blocked_on) {
      return true;
    } else {
      return false;
    }
  }
}
