<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Server;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use MinecraftServerStatus\MinecraftServerStatus;

class ServersController extends Controller
{

    public function index(){

    Server::rank_servers();
    $comments = Comment::all();
    $servers = Server::orderBy('rank', 'ASC')->paginate(10);
    return view('welcome', compact('servers', 'comments'));

    }
    public function vote($id){
      $user = Auth::user();
      if($user->ableToVote()){
        Vote::create(['server_id'=>$id, 'user_id'=> Auth::id()]);
        $server = Server::findOrFail($id);
        $votes = count(Vote::where('server_id', $server->id)->get());
        $server->update(['votes'=>$votes]);

        Session::flash('message', 'Vote successful');
        return redirect()->back();
      } else {
        Session::flash('message', 'Sorry, you can vote only once a month');
        return redirect()->back();
      }
    }

    public function top(){
      $servers = Server::orderBy('rank', 'ASC')->get();
      return view ('top', compact('servers'));
    }

    public function view($id) {
      $server = Server::findOrFail($id);
      $comments = Comment::where('server_id', $id)->get();
      $stats = MinecraftServerStatus::query($server->address, 25565);
      return view('server', compact('server', 'stats', 'comments'));
    }


}
