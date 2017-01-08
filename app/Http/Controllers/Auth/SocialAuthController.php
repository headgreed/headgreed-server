<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\SocialAccount;
use App\User;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        $data = Socialite::driver('facebook')->stateless()->user();
        $user = $this->facebookService($data);
        auth()->login($user);
        return redirect('/home#');
    }

    public function facebook(Request $request)
    {
        $user = $this->facebookService($request);
        return $user;
    }

    public function facebookService($data)
    {
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

                if (isset($data->gender)) {
                    $gender = $data->gender;
                } else {
                    $gender = $data->user['gender'];
                }

                $user = User::create([
                    'slug' => uniqid(),
                    'ori_name' => $data->name,
                    'name' => $data->name,
                    'email' => $email,
                    'gender' => $gender,
                    'avatar' => $new_name,
                    'location' => '',
                    'about' => '',
                    'api_token' => md5(uniqid(rand(), TRUE))
                ]);
            }

            $account->user()->associate($user);
            $account->save();
        }

        return $user;
    }
}
