<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact',
        'language',
        'solution',
        'solutionist'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'contact_id');
    }


    public function scopeSearch($query, $search) {
        if ($search !== null) {
            $search_split = mb_convert_kana($search, 's');
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' . $value . '%');
            }
        }
        return $query;
    }
}
