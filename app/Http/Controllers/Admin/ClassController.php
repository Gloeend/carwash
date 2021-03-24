<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function view()
    {
        return view('admin.class');
    }

    public function update(Request $obRequest, Classes $obClasses)
    {
        $obClass = $obClasses::where(['title' => $obRequest->title])->first();
        $obValidatedData = $obRequest->validate([
            'price' => 'required|integer|min:0',
        ], [
            'required' => 'Заполните поле ":attribute"',
            'unique' => 'Поле ":attribute" должно быть уникальным',
            'price.min' => 'Цена должна быть не менее нуля',
        ], [
            'price' => 'Цена',
        ]);
        $obClass->update([
            'price' => $obRequest->price,
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obClasses = Classes::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.classes', compact('obClasses'))->render();
        }
    }
}
