<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHighlight extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'student_highlights';

    protected $fillable = [
        'title', 'description', 'image', 'class', 'achievement', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
