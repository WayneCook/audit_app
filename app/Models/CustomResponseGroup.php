<?php

namespace App\Models;

use App\Models\CustomResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomResponseGroup extends Model
{
    use HasFactory;

    public function responses()
    {
        return $this->hasMany(CustomResponse::class);
    }
}
