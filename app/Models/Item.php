<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'lab_id',
        'name',
        'type',
        'stock',
        'borrowed',
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
