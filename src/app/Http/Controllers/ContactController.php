<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function confirm(ContactRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();

        // 確認画面の処理
        return view('confirm', ['data' => $validated]);
        // return view('confirm', compact('validated'));
    }
        
    public function thanks()
    {
        return view('thanks');
    }
}