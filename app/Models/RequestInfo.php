<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInfo extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->hasOne(Request::class);
    }
    
}    
