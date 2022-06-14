<?php

namespace App\Models;

use App\Http\Controllers\PinjamanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Barang extends Model
{
    use HasFactory;

    public function Pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}

