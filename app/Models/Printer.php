<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Printer extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
    ];

    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


}
