<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy {
  use HandlesAuthorization;

  public function view(User $user) {
    return true;
  }

  public function create(User $user) {
    return $user->isSuperAdmin();
  }

  public function update(User $user) {
    return $user->isSuperAdmin();
  }

  public function delete(User $user) {
    return $user->isSuperAdmin();
  }
}
