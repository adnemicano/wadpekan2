<?php

namespace App\Policies;

use App\Models\TopikBidangIlmu;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TopikBidangIlmuPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TopikBidangIlmu $topikBidangIlmu): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TopikBidangIlmu $topikBidangIlmu): bool
    {
        //operator dan admin bole ubah data
        return $user->hasRole('operator', 'admin')
        && $topikBidangIlmu->status !== 'Selesai';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TopikBidangIlmu $topikBidangIlmu): bool
    {
       //admin bisa hapus data
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TopikBidangIlmu $topikBidangIlmu): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TopikBidangIlmu $topikBidangIlmu): bool
    {
        return false;
    }
}
