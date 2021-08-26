<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\Audit;

class Category extends Model
{
    use HasFactory;

    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    
}
