<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;


class Audit extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Department::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    
        
}
