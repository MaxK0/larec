<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'total',
        'info',
        'status',
        'user_id',
        'address',
        'date_order'
    ];

    protected $casts = [
        'total' => 'integer',
        'status' => StatusEnum::class,
        'date_order' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('quantity');
    }
}
