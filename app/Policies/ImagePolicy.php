<?php

namespace App\Policies;

use App\User;
use App\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy {
  use HandlesAuthorization;

  public function before(User $user) {
    if ($user->isSuperAdmin()) {
      return true;
    }
  }

  public function view(User $user) {
    return true;
  }

  public function create(User $user) {
    return true;
  }

  public function update(User $user, Image $image) {
    return $user->id == $image->user_id;
  }

  public function delete(User $user, Image $image) {
    return $user->id == $image->user_id;
  }
}
