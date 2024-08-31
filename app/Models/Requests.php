<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone_number',
        'CIN',
        'institution',
        'position',
        'type',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
