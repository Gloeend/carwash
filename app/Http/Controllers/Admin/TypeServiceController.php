<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TypeService;
use App\Http\Controllers\Controller;

class TypeServiceController extends Controller
{
    public function view()
    {
        return view('admin.type');
    }

    public function create(Request $obRequest)
    {
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:type_service,title',
        ], [
            'required' => 'Заполните поле ":attribute".',
            'unique' => 'Поле ":attribute" должно быть уникальным.',
        ], [
            'title' => 'Название',
        ]);
        (new TypeService())->fill([
            'title' => $obRequest->title,
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function update(Request $obRequest, TypeService $obTypesServices)
    {
        $obTypeService = $obTypesServices::where(['id' => $obRequest->id])->first();
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:type_service,title,' . $obTypeService->id,
        ], [
            'required' => 'Заполните поле ":attribute".',
            'unique' => 'Поле ":attribute" должно быть уникальным.',
        ], [
            'title' => 'Название',
        ]);
        $obTypeService->update([
            'title' => $obRequest->title,
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return TypeService::where(['title' => $obRequest->title])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obTypes = TypeService::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.types', compact('obTypes'))->render();
        }
    }
}
