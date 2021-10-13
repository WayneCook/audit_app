<?php

namespace App\Models;

use App\Models\User;
use App\Models\TemplateSection;
use App\Models\CustomResponseGroup;
use App\Models\AvailableResponse;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultipleChoiceResponseGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function sections()
    {
        return $this->hasMany(TemplateSection::class);
    }


    public function multipleChoiceResponseTypes()
    {
        return $this->hasMany(ResponseType::class);
    }

    public function defaultResponseTypes()
    {
        return $this->whereNull(ResponseType::class);
    }

  
}
