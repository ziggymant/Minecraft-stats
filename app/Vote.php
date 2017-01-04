<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'server_id'];

    public function server(){
      return $this->belongsTo('App\Server');
    }

    public function user() {
      return $this->hasOne('App\User');
    }

    public function count_votes($id){
      $votes = Votes::where('server_id', $id);
      return count($votes);
    }
}
