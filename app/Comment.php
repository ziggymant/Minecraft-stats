<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'server_id',
    'email',
    'body',
    'is_active',
    'author'
  ];

  public function server(){
    return $this->belongsTo('App\Server');
  }
  public function replies(){
    return $this->hasMany('App\Reply');
  }

}
