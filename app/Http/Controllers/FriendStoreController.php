<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendStoreController extends Controller
{

   public function __construct(){

    $this->middleware(['auth']);
   }

   public function __invoke(User $user, Request $request )
   {
      //dd($user);
      if ($request->user()->hasPendingFriendRequestFor($user)){

        return back();
      }
      $request->user()->pendingFriendsTo()->attach($user);

      return back();
   }
}
