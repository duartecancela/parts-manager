<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInput extends Model
{
    use HasFactory;
    protected $fillable = [
        'part_id',
        'storage_id',
        'supplier_id',
        'quantity',
        'description'
    ];

    public function parts()
    {
        return $this->belongsTo(Part::class, 'part_id', 'id');
    }

    public function storages()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

}
