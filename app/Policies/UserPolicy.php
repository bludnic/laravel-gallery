<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
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

  public function update(User $user, User $author) {
    return $user->id === $author->id;
  }

  public function delete(User $user, User $author) {
    return $user->id === $author->id;
  }
}
