<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function servers() {
        return $this->hasMany('App\Serve');
      }
    public function server_users() {
        return $this->hasMany('App\Serve_User');
      }
}
