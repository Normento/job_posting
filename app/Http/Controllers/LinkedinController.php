<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Socialite;
use App\Models\User;
use phpDocumentor\Reflection\Types\Null_;

class LinkedinController extends Controller
{
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function linkedinCallback()
    {
        try {

            $user = Socialite::driver('linkedin')->user();

            $linkedinUser = User::where('oauth_id', $user->id)->first();

            if($linkedinUser){

                Auth::login($linkedinUser);

                return redirect('/');

            }else{
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'linkedin',
                    'password' => encrypt('admin12345'),
                ]);

                Auth::login($user);

                if(Auth::user()->status == NULL){
                    return redirect('/user');
                }else{
                return redirect('/website/about');
            }
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
