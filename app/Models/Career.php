<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Career extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
