<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Cli\Invoker;
use Illuminate\Http\Request;

class FriendDestroyController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']);
       }

    public function __invoke(User $user, Request $request){

      //dd($user);
       if ($request->user()->friendsTo()->detach($user)){

        return back();
       }
      $request->user()->friendsFrom()->detach($user);

      return back();
    }
}
