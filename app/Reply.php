<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $fillable = [
    'comment_id',
    'email',
    'body',
    'is_active',
    'author'
  ];

  public function comment(){
    return $this->belongsTo('App\Comment');
  }
}
