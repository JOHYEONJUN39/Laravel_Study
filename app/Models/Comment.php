<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactForm;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function contactForm()
    {
        return $this->belongsTo(ContactForm::class, 'contact_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
