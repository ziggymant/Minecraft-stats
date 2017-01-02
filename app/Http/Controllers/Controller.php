<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MinecraftServerStatus\MinecraftServerStatus;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(){
    	$servers = array(
		"s.nerd.nu",
		"play.skybattle.net",
		"YayMc.com",
		"play.gotpvp.com",
		"rexcraftia.com"
		);
		return view('welcome', compact('servers'));


    }
    public function admin(){
    	$servers = array(
		"s.nerd.nu",
		"play.skybattle.net",
		"YayMc.com",
		"play.gotpvp.com",
		"rexcraftia.com"
		);
		return view('admin.index', compact('servers'));
    }
}
