<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'example_json'
    ];

    protected $casts = [
        'example_json' => 'array',
    ];
}
