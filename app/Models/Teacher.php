<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
