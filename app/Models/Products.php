<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetails::class);
    }
}
