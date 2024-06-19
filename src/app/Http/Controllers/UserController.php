<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    // データ一覧ページの表示
    public function admin()
    {
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        foreach ($contacts as $contact) {
            $category = Category::find($contact->category_id);
        $contact->category = $category ? $category->content : 'カテゴリー未設定';
        }
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    // 検索フォームの表示
    public function find(Request $request)
    {
        $categories = Category::all();
        return view('find', ['input' => '', 'categories' => $categories]);
    }

    // 検索処理
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category = $request->input('category');
        $date = $request->input('date');

        $query = Contact::query();

        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('first_name', 'LIKE', "%{$keyword}%")
                ->orWhere('last_name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
            });
        }

        if ($gender !=="0" && $gender !=="") {
            $query->where('gender', $gender);
        }

        if (!empty($category)) {
            $query->where('category_id', $category);
        }

        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        $contacts = $query->paginate(7);
        $categories = Category::all();
        foreach ($contacts as $contact) {
            $category = Category::find($contact->category_id);
        $contact->category = $category ? $category->content : 'カテゴリー未設定';
        }

        return view('find', compact('contacts', 'categories'));
    }

    // モーダルウィンドウ
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('show', compact('contact'));
    }


   // ログインページの表示
    public function login() {
        return view('auth.login');
    }

    // 登録画面の表示
    public function register() {
        return view('auth.register');
    }

    // 登録機能
    public function create(UserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }

    // 認証処理
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した場合、intendedを使用して元のリクエストページにリダイレクト
            return redirect()->intended('/admin');
        }

        // 認証に失敗した場合
        return redirect('login')
            ->withErrors([
                        'email' => 'メールアドレスが一致しません',
                        'password' => 'パスワードが一致しません'
                    ])
            ->withInput();
    }
}
