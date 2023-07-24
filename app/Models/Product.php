<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillabel = [
        'cate_id',
        'name',
        'description',
        'original_price',
        'image',
        'afiliado_id',
        'produtor_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
    public function afiliado()
    {
        return $this->belongsTo(Afiliados::class, 'afiliado_id', 'id');
    }
    public function produtor()
    {
        return $this->belongsTo(Produtor::class, 'produtor_id', 'id');
    }

}
