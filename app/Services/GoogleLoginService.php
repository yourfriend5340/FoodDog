<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

class GoogleLoginService{

    public function login($user){

        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            // Log in the existing user.
            auth()->login($existingUser, true);
        } else {
            $existingUserMail = User::where('email',$user->email)->exists();

            if($existingUserMail){
                return redirect('/login')->with('error', "you had registered $user->email ,please use password to login");
            }
            else{
                // Create a new user.
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->password = bcrypt(request(Str::random())); // Set some random password
                $newUser->save();

                // Log in the new user.
                auth()->login($newUser, true);


            }


        }
    }

}