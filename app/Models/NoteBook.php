<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NoteBook extends Model
{
    use SoftDeletes;
    protected $table = 'notebooks';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    protected $fillable =
        [
            'title',
            'author_id',
            'description',
            'category',
            'public',
            'slug',
        ];
}
