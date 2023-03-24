<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Printer extends Model
{
    use HasFactory, HasUuids;

    
    protected $fillable = [
        'name',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


}
