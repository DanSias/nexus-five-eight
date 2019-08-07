<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
