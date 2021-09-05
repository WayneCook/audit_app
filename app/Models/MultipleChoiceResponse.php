<?php

namespace App\Models;

use App\Models\ResponseType;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultipleChoiceResponseGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultipleChoiceResponse extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function responseType()
    {
      return $this->belongsTo(ResponseType::class);
    }


}
