<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classes;
use App\Models\Mark;
use App\Models\Mmc;
use App\Models\Models;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MmcController extends Controller
{
    public function view()
    {
        return view('admin.mmc', [
            'obMarks' => Mark::get(),
            'obClasses' => Classes::get(),
        ]);
    }

    public function create(Request $obRequest, Models $obModel)
    {
        $obValidatedData = $obRequest->validate([
            'title' => 'required|min:0',
            'mark' => 'required|exists:mark,title',
            'class' => 'required|exists:class,title',
        ], [
            'required' => 'Заполните поле ":attribute"',
            'min' => 'Минимальная длина поля ":attribute" :min символов',
        ], [
            'title' => 'Название',
            'mark' => 'Марка',
            'class' => 'Класс',
        ]);
        $obModel->fill([
            'title' => $obRequest->title
        ])->save();

        (new Mmc())->fill([
            'id_model' => $obModel->id,
            'id_mark' => Mark::where(['title' => $obRequest->mark])->first()->id,
            'id_class' => Classes::where(['title' => $obRequest->class])->first()->id
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function update(Request $obRequest, Models $obModels, Mmc $obMmcs)
    {
        $obMmc = $obMmcs::where(['id' => $obRequest->id])->first();
        $obModel = $obModels::where(['id' => $obMmc->id_model])->first();
        $obValidatedData = $obRequest->validate([
            'mark' => 'required|exists:mark,title',
            'class' => 'required|exists:class,title',
            'title' => 'required|min:0',
        ], [
            'required' => 'Заполните :attribute',
            'unique' => ':attribute должен быть уникальным',
            'min' => 'Минимальная длина :attribute :value символов',
        ], [
            'title' => 'Название',
            'id_mark' => 'Марка',
            'id_class' => 'Класс',
        ]);
        if ($obRequest->title !== $obModel->title) {
            $obModel->update(['title' => $obRequest->title]);
        }
        $obMmc->update([
            'id_model' => $obModel->id,
            'id_mark' => Mark::where(['title' => $obRequest->mark])->first()->id,
            'id_class' => Classes::where(['title' => $obRequest->class])->first()->id
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return Models::where(['id' => $obRequest->id])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obMmcs = Mmc::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.mmcs', compact('obMmcs'))->render();
        }
    }
}
