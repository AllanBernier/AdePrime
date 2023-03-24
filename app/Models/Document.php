<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'mime_type',
        'is_deleted',
        'printer_id'
    ];

    public function printer()
    {
        return $this->belongsTo(Printer::class);
    }
}
