<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class TemplateQuestion extends Model implements Sortable, Scope
{
    use HasFactory;
    use SortableTrait;

    // public function scopeOrdered($query)
    // {
    //     return $query->orderBy('order_column', 'asc')->get();
    // }

    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('order_column', 'asc');
    }


}
