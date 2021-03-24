<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TypeService;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function view()
    {
        return view('admin.service', [
            'obTypeServices' => TypeService::get(),
        ]);
    }

    public function create(Request $obRequest)
    {
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:service,title',
            'type' => 'required|exists:type_service,title',
            'price' => 'required|numeric'
        ], [
            'required' => 'Заполните поле ":attribute".',
            'unique' => 'Поле ":attribute" должно быть уникальным.',
            'min' => 'Минимальная длина поля ":attribute" :min символов.',
            'max' => 'Максимальная длина поля ":attribute" :max символов.',
            'type.exists' => 'Такого типа услуги нету.',
        ], [
            'title' => 'Название',
            'type' => 'Тип услуги',
            'price' => 'Цена',
        ]);
        (new Service())->fill([
            'title' => $obRequest->title,
            'id_type_service' => TypeService::where(['title' => $obRequest->type])->first()->id,
            'price' => $obRequest->price
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function update(Request $obRequest, Service $obServices)
    {
        $obService = $obServices::where(['id' => $obRequest->id])->first();
        $obValidatedData = $obRequest->validate([
            'title' => 'required|unique:service,title,' . $obService->id,
            'type' => 'required|exists:type_service,title',
            'price' => 'required|numeric'
        ], [
            'required' => 'Заполните поле ":attribute".',
            'unique' => 'Поле ":attribute" должно быть уникальным.',
            'min' => 'Минимальная длина поля ":attribute" :min символов.',
            'max' => 'Максимальная длина поля ":attribute" :max символов.',
            'id_type_service.exists' => 'Такого типа услуги нету.',
        ], [
            'title' => 'Название',
            'type' => 'Тип услуги',
            'price' => 'Цена',
        ]);
        $obService->update([
            'title' => $obRequest->title,
            'id_type_service' => TypeService::where(['title' => $obRequest->type])->first()->id,
            'price' => $obRequest->price
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return Service::where(['title' => $obRequest->title])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $request)
    {
        if ($request->ajax()) {
            $obServices = Service::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
            return view('admin.pagination.services', compact('obServices'))->render();
        }
    }
}
