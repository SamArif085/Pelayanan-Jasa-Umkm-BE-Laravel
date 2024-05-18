<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';

    public function UserPelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }
    public function UserAdmin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id');
    }
    public function UserTeknisi()
    {
        return $this->belongsTo(User::class, 'id_teknisi', 'id');
    }
}
