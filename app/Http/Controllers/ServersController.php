<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Server;
use Illuminate\Support\Facades\Auth;
use MinecraftServerStatus\MinecraftServerStatus;

class ServersController extends Controller
{

    public function index(){

    Server::rank_servers();
    $servers = Server::orderBy('rank', 'ASC')->get();
    return view('welcome', compact('servers'));

    }
    public function vote($id){
      Vote::create(['server_id'=>$id, 'user_id'=> Auth::id()]);
      $server = Server::findOrFail($id);
      $votes = count(Vote::where('server_id', $server->id)->get());
      $server->update(['votes'=>$votes]);
      return redirect()->back();
    }

    public function view($id) {
      $server = Server::findOrFail($id);
      $stats = MinecraftServerStatus::query($server->address, 25565);
      return view('server', compact('server', 'stats'));
    }


}
