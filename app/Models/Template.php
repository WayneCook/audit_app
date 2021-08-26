<?php

namespace App\Models;

use App\Models\User;
use App\Models\TemplateSection;
use App\Models\CustomResponseGroup;
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

    public function templates()
    {
        return $this->belongsTo(User::class);
    }

    // public function multipleChoiceResponseGroups()
    // {
    //     return $this->hasMany(MultipleChoiceResponseGroup::class);
    // }

    public function defualtMultipleChoiceResponseGroups()
    {
        // return $this->hasMany(CustomResponseGroup::class);
        return MultipleChoiceResponseGroup::whereNull('template_id')->get();
    }

    public function multipleChoiceResponseGroups()
    {
        return $this->hasMany(MultipleChoiceResponseGroup::class);
    }

  
}
