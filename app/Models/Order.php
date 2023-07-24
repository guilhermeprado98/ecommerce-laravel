<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'email',
        'status',
        'message',
        'total_price',
        'comissao_afiliado',
        'comissao_produtor',
    ];
}
