<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'from_price', 'to_price', 'status'];


    public function orders()
    {
        return $this->hasOne(Order::class);
    }

    public function scopeLatest($query)
    {
        return $query->orderByDesc('created_at');
    }
}
