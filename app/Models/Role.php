<?php

namespace App\Models;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function career()
    {
        return $this->hasMany(Career::class);
    }

    protected static function booted()
    {
        static::deleting(function ($role) {
            foreach ($role->teams as $team) {
                if ($team->photo) {
                    ImageService::deleteImage($team->photo);
                }
                $team->delete();
            }
        });
    }
}
