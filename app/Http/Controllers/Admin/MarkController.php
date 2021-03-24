<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    public function view()
    {
        return view('admin.mark');
    }

    public function create(Request $obRequest)
    {
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:mark',
        ], [
            'required' => 'Заполните поле ":attribute"',
            'unique' => 'Поле ":attribute" должно быть уникальным',
        ], [
            'title' => 'Название',
        ]);
        (new Mark())->fill([
            'title' => $obRequest->title,
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function update(Request $obRequest, Mark $obMarks)
    {
        $obMark = $obMarks::where(['id' => $obRequest->id])->first();
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:mark,id,' . $obMark->id,
        ], [
            'required' => 'Заполните поле ":attribute"',
            'unique' => 'Поле ":attribute" должно быть уникальным',
        ], [
            'title' => 'Название',
        ]);
        $obMark->update([
            'title' => $obRequest->title,
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return Mark::where(['title' => $obRequest->title])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obMarks = Mark::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.marks', compact('obMarks'))->render();
        }
    }
}
