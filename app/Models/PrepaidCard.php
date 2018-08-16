<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrepaidCard extends Model
{
    public function serviceProvider() {
      return $this->belongsTo('App\Models\ServiceProvider')->withDefault();
    }
}
