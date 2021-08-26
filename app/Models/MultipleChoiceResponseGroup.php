<?php

namespace App\Models;

use App\Models\Template;
use App\Models\MultipleChoiceResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultipleChoiceResponseGroup extends Model
{
    use HasFactory;

    public function responses()
    {
        return $this->hasMany(MultipleChoiceResponse::class);
    }

    public function template()
{
    return $this->belongsTo(Template::class)->withDefault([
        'templates_id' => null,
    ]);
}
}
