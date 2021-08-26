<?php

namespace App\Models;

use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateSection extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(TemplateQuestion::class)->orderBy('order_column');
    }
}
