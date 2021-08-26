<?php

namespace App\Models;

use App\Models\MultipleChoiceResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionResponseType extends Model
{
    use HasFactory;


    public function responses()
    {
        return $this->hasMany(MultipleChoiceResponse::class);
    }
}
