<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public $timestamps = false;

    public function partner()
    {
        $this->belongsTo(Partner::class);
    }
}
