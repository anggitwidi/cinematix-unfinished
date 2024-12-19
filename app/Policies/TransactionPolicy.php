<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;

class TransactionPolicy
{
    /**
     * Determine whether the user can view any transactions.
     */
    public function viewAny(User $user): bool
    {
        // Pastikan ada logika untuk menentukan apakah user bisa melihat transaksi
        // Misalnya, jika user adalah admin, mereka bisa melihat semua transaksi
        return $user->is_admin; // return true jika user admin, false jika bukan
    }

    /**
     * Determine whether the user can view the transaction.
     */
    public function view(User $user, Transaction $transaction): bool
    {
        // Misalnya, hanya admin yang bisa melihat transaksi atau user yang membuat transaksi
        return $user->is_admin || $user->id === $transaction->user_id;
    }

    /**
     * Determine whether the user can create transactions.
     */
    public function create(User $user): bool
    {
        // Logika untuk menentukan apakah user bisa membuat transaksi
        return true; // Contoh: semua user bisa membuat transaksi
    }

    /**
     * Determine whether the user can update the transaction.
     */
    public function update(User $user, Transaction $transaction): bool
    {
        // Hanya admin atau user yang membuat transaksi yang bisa mengubahnya
        return $user->is_admin || $user->id === $transaction->user_id;
    }

    /**
     * Determine whether the user can delete the transaction.
     */
    public function delete(User $user, Transaction $transaction): bool
    {
        // Hanya admin yang bisa menghapus transaksi
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the transaction.
     */
    public function restore(User $user, Transaction $transaction): bool
    {
        // Hanya admin yang bisa me-restore transaksi
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the transaction.
     */
    public function forceDelete(User $user, Transaction $transaction): bool
    {
        // Hanya admin yang bisa menghapus transaksi secara permanen
        return $user->is_admin;
    }
}
