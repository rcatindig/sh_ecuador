<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
      //
      public function prepaidCards() {
        return $this->hasMany('App\Models\PrepaidCard');
      }
}
