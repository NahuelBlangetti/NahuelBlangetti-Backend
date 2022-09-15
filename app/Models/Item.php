<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'cant_ataque', 
        'type',
        'cant_defensa', 
    ];

    public function user(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, UserHasItem::class);
    }

    public function itemType(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'type');
    }
}
