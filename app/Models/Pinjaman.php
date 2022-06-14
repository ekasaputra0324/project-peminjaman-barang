<?php

namespace App\Models;

use App\Http\Controllers\BarangController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    // private  $guarded = ['id'];

    Public function Barang()
    {
        return $this->hasMany(Barang::class);
    }
}
