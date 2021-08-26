<?php

namespace App\Models;
use App\Models\Score;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAudit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scores() {
        return $this->hasMany(Score::class);

    }
}
