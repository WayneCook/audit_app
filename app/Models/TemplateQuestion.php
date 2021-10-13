<?php

namespace App\Models;

use App\Models\ResponseType;
use App\Models\TemplateSection;

use App\Models\AvailableResponse;
use Spatie\EloquentSortable\Sortable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateQuestion extends Model implements Sortable, Scope
{
    use HasFactory;
    use SortableTrait;
    protected $guarded = [];

    

    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('order_column', 'asc');
    }

    public function templateSection() {
      return $this->belongsTo(TemplateSection::class);
    }

    public function responseType() {
      return $this->belongsTo(ResponseType::class);
    }

    public function buildSortQuery()
    {
        return static::query()->where('template_section_id', $this->template_section_id);
    }

 


}
