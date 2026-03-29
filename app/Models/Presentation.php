<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    /**
     * Mass assignable bo'lgan maydonlar.
     */
    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'status',
        'parsed_content',
        'ai_explanation',
        'title',
    ];

    /**
     * User bilan bog'liqlik (Relationship)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
