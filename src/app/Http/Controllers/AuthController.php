<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ユーザー登録フォーム表示
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ユーザー登録処理
    public function register(RegisterRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();

        // ユーザー登録処理を実行
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // ユーザーをログインさせる
        auth()->login($user);

        // ログインページにリダイレクト
        return redirect()->route('login');
    }

    // ログインフォーム表示
    public function loginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        // バリデーションルールの設定
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは6文字以上で入力してください',
        ]);

        // ログイン処理
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // ログイン成功時に管理画面へリダイレクト
            return redirect()->route('admin');
        } else {
            // ログイン失敗時のメッセージ
            return back()->withErrors([
                'login_error' => 'メールアドレスまたはパスワードが違います',
            ])->withInput();
        }
    }
}


