<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function notebook()
    {
        return $this->hasMany(Notebook::class, 'category', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
    protected $fillable =
        [
            'title',
            'description',
            'slug',
            'id',
            'level',
            'parent_id',
            'author',
        ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }
}
