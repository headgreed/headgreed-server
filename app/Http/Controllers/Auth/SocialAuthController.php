<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\SocialAccount;
use App\User;
use GuzzleHttp\Client;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        $data = Socialite::driver('facebook')->user();

        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($data->id)
            ->first();

        if ($account) {
            $user = $account->user;
        }
        else {
            $email = $data->email;
            if ($data->email == null) {
                $email = $data->id . "@fb.headgreed.com.tw";
            }

            $account = new SocialAccount([
               'provider' => 'facebook',
               'provider_user_id' => $data->id,
               'avatar_url' => $data->avatar,
               'avatar_original' => $data->avatar_original,
               'profileUrl' => $data->profileUrl
            ]);

            $user = User::whereEmail($email)->first();

            if (!$user) {
                $file = file_get_contents($data->avatar);
                $new_name = uniqid().".jpg";
                $new_path = storage_path("app/public/avatar/{$new_name}");
                file_put_contents($new_path, $file);

                $user = User::create([
                    'slug' => uniqid(),
                    'ori_name' => $data->name,
                    'name' => $data->name,
                    'email' => $email,
                    'gender' => $data->user['gender'],
                    'avatar' => $new_name,
                    'api_token' => str_random(60)
                ]);
            }

            $account->user()->associate($user);
            $account->save();
        }

        auth()->login($user);
        return redirect('/home#');
    }

    public function facebook(Request $request)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($request->id)
            ->first();

        if ($account) {
            $user = $account->user;
        }
        else {
            $email = $request->email;
            if ($email == null) {
                $email = $request->id . "@fb.headgreed.com.tw";
            }

            $account = new SocialAccount([
               'provider' => 'facebook',
               'provider_user_id' => $request->id,
               'avatar_url' => $request->avatar,
               'avatar_original' => $request->avatar_original,
               'profileUrl' => $request->profileUrl
            ]);

            $user = User::whereEmail($email)->first();

            if (!$user) {
                $file = file_get_contents($request->avatar);
                $new_name = uniqid().".jpg";
                $new_path = storage_path("app/public/avatar/{$new_name}");
                file_put_contents($new_path, $file);

                $user = User::create([
                    'slug' => uniqid(),
                    'ori_name' => $request->name,
                    'name' => $request->name,
                    'email' => $email,
                    'gender' => $request->gender,
                    'avatar' => $new_name,
                    'api_token' => str_random(60)
                ]);
            }

            $account->user()->associate($user);
            $account->save();
        }

        return $user;
    }
}
