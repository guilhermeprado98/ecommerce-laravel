<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtor extends Model
{
    use HasFactory;
    protected $table = 'produtor';
    protected $fillable = [
        'name',
    ];
}
