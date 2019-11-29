<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server_User extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User');
      }
    public function server() {
        return $this->belongsTo('App\Server');
      }
}
