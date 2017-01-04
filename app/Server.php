<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['address', 'port', 'user_id', 'description', 'banner_url', 'votes', 'rank'];

    public function votes(){
      return $this->hasMany('App\Vote');
    }

    public function count_votes(){
      $votes = count(Vote::where('server_id', $this->id)->get());
      return $votes;
    }

    static function rank_servers(){
      $servers = Server::orderBy('votes', 'DESC')->get();
      $number = count($servers);
      for ($i=0; $i < $number ; $i++) {
        $server = $servers[$i];

        $server->update(['rank'=>$i+1]);
      }
    }

}
