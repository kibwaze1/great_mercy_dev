<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'staff';

    protected $fillable = [
        'name', 'image', 'position', 'category', 'bio',
        'qualification', 'experience_years', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
