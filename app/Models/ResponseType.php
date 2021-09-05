<?php

namespace App\Models;

use App\Models\MultipleChoiceResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResponseType extends Model
{
  use HasFactory;

  protected $with = ['multipleChoiceResponses'];


  public function multipleChoiceResponses()
  {
      return $this->hasMany(MultipleChoiceResponse::class);
  }

  public function defaultResponses()
  {
      return $this->whereNull('template_id')->get();
  }

}
