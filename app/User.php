<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
      return $this->belongsTo('App\Role');
    }

    public function isAdmin(){
      if($this->role->name == "administrator" && $this->is_active == 1){
        return true;
      }
      return false;
    }

    public function votes(){
      return $this->hasMany('App\Vote');
    }

    public function ableToVote(){
      if($last_vote = Vote::where('user_id', $this->id)->orderBy('created_at', 'DESC')->first()){
        $days_ago = $last_vote['created_at']->day;
        if($days_ago >= 30) {
          return true;
        }elseif($days_ago < 30) {
          return false;
        }
      } else {
        return true;
      }
    }
}
