<?php

namespace App\Models;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjam extends Model
{
    protected $table = 'pinjam';
    protected $fillable=['nama','tgl_pinjam','gas_id','qty'];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'gas_id', 'id');
    }
}
