<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'body',
        'cover',
        'tags',
        'created_by',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}