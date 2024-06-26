<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    protected $table = 'layanan';

    public function UserTeknisi()
    {
        return $this->belongsTo(User::class, 'teknisi', 'id');
    }
}
