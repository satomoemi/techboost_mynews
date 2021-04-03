<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する{{csrf_field ()}}があり、csrf対策用のトークンが送られてきますがデータベースへ保存するときにいらないので、ここで削除しています。
        unset($form['_token']);
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/create');
      
    }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
