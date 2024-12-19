<?php

namespace App\Policies;

use App\Models\Film;
use App\Models\User;

class FilmPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Semua pengguna bisa melihat daftar film
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Film $film): bool
    {
        // Pengguna bisa melihat film yang berstatus published atau jika user adalah admin
        return $film->status === 'published' || $user->is_admin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Hanya admin yang bisa membuat film
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Film $film): bool
    {
        // Hanya admin atau pemilik film yang bisa mengupdate film
        return $user->is_admin || $user->id === $film->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Film $film): bool
    {
        // Hanya admin yang bisa menghapus film
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Film $film): bool
    {
        // Hanya admin yang bisa me-restore film
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Film $film): bool
    {
        // Hanya admin yang bisa menghapus film secara permanen
        return $user->is_admin;
    }
}
