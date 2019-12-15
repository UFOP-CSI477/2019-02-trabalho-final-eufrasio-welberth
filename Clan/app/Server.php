<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
    public function game() {
        return $this->belongsTo('App\Game');
      }
    public function server_users() {
        return $this->hasMany('App\Serve_User');
      }
      protected $fillable = [
        'name', 'game_id',
    ];
}
