<?php

namespace App\Models;

use App\Models\TemplateSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    
    public function section()
    {
      return belongsTo(TemplateSection::class);
    }
}
