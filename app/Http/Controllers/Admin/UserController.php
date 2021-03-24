<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function view()
    {
        return view('admin.user', [
            'obUsers' => User::where('id', '!=', Auth::user()->id)
                ->orWhereNull('id')
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15)
        ]);
    }

    public function create(Request $obRequest)
    {
        $obValidatedData = $obRequest->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:255|required|regex:/[А-Яа-яЁё]/u',
            'password' => 'required|min:6|max:127'
        ], [
            'regex' => 'ФИО должно быть на русском языке!',
            'required' => 'Заполните поле ":attribute"',
            'unique' => 'Поле ":attribute" должно быть уникальным',
            'min' => 'Минимальная длина поля ":attribute" :min символов',
            'max' => 'Максимальная длина поля ":attribute" :max символов',
        ], [
            'name' => 'ФИО',
            'email' => 'Почта',
            'password' => 'Пароль',
        ]);
        (new User())->fill([
            'name' => $obRequest->name,
            'email' => $obRequest->email,
            'password' => $obRequest->password
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function update(Request $obRequest, User $obUsers)
    {
        $obUser = $obUsers::where(['id' => $obRequest->id])->first();
        $obValidatedData = $obRequest->validate([
            'email' => 'email|required|unique:users,id,' . $obUser->id,
            'name' => 'required|max:255|required|regex:/[А-Яа-яЁё]/u',
            'password' => 'min:6|max:127|required'
        ], [
            'regex' => 'ФИО должно быть на русском языке!',
            'required' => 'Заполните :attribute',
            'unique' => ':attribute должен быть уникальным',
            'min' => 'Минимальная длина :attribute :min символов',
            'max' => 'Максимальная длина :attribute :max символов',
        ], [
            'name' => 'ФИО',
            'email' => 'Почта',
            'password' => 'Пароль',
        ]);
        $obUser->update([
            'name' => $obRequest->name,
            'email' => $obRequest->email,
            'password' => Hash::make($obRequest->password)
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return User::where(['email' => $obRequest->email])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obUsers = User::where('id', '!=', Auth::user()->id)
                ->orWhereNull('id')
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.users', compact('obUsers'))->render();
        }
    }
}
