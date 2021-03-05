<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect('/');

    }

    //　Twitterログアウト
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

}
