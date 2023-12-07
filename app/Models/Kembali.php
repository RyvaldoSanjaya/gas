<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    protected $table = 'kembali1';
    protected $fillable=['nama','tgl_kembali','gas_id','qty'];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'gas_id', 'id');
    }
}
