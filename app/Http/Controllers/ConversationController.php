<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
   public function index(){
        $conversations = Auth::user()->conversations()->latest()->paginate(6);
      return view('conversation.index',compact('conversations'));
   }

   public function show(Conversation $conversation){
        return view('conversation.show',compact('conversation'));
    }
}
