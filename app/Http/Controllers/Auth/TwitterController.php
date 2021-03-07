<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Socialite;

class TwitterController extends Controller
{
    // Twitterログイン
    public function redirectToProvider(){
        return Socialite::driver('twitter')->redirect();
    }

    // Twitterコールバック
    public function handleProviderCallback() {

        try {
            // ユーザー詳細情報の取得
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        $myinfo = User::firstOrCreate(['token' => $user->token],['name' => $user->nickname]);
        Auth::login($myinfo);
        return redirect()->to('/');

    }

    //　Twitterログアウト
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

}
