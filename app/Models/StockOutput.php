<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOutput extends Model
{
    use HasFactory;

    public function parts()
    {
        return $this->belongsTo(Part::class);
    }
}
