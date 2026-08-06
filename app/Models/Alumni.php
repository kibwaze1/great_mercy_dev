<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'alumni';

    protected $fillable = [
        'name', 'image', 'graduation_year', 'bio', 'achievements',
        'current_occupation', 'message', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
