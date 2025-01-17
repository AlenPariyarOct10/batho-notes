<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function notebook()
    {
        return $this->hasMany(Notebook::class);
    }
    protected $fillable =
        [
            'title',
            'description',
            'slug',
            'id',
            'level',
            'parent_id',

        ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }
}
