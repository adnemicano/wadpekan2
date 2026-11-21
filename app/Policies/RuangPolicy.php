<?php
namespace App\Policies;
use App\Models\Ruang;
use App\Models\User;
class RuangPolicy
{
    public function update(User $user, Ruang $ruang): bool
    {
        return $user->hasRole('admin', 'petugas')
            && $ruang->fasilitas !== 'Tidak ada';
    }

    // Method Policy khusus untuk Langkah 7.2: boleh mengubah semua kolom?
    public function updateFull(User $user, Ruang $ruang): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Ruang $ruang): bool
    {
        return $user->hasRole('admin');
    }
}