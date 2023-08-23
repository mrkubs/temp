<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetails extends Model
{
    use HasFactory;

    protected $table = "pesanan_details";
    protected $guarded = ['id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
