<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $table = 'users';

    public function pesanan(): HasMany
    {
        return $this->hasMany(PesananModel::class, 'id_pelanggan');
    }
}
