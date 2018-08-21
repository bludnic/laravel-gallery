<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy {
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

  public function update(User $user, Comment $comment) {
    return $user->id === $comment->user_id;
  }

  public function delete(User $user, Comment $comment) {
    return $user->id === $comment->user_id;
  }
}
