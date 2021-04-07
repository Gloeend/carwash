<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Mark;
use App\Models\Mmc;
use App\Models\Models;
use App\Models\Service;
use App\Models\TypeService;
use App\Models\Client;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function render()
    {
        return view('order', [
            'arServices' => Service::sortTypes(),
            'obModels' => Models::all(),
            'obMarks' => Mark::all(),
        ]);
    }

    public function getModels(Request $obRequest)
    {
        return response()->json(['obModels' => Mmc::getSortedModels($obRequest->id_mark)]);
    }

    public function getClass(Request $obRequest)
    {
        $obClass = Mmc::where(['id_model' => $obRequest->id_model])->first()->class()->first();
        return response()->json(['title' => $obClass->title, 'price' => $obClass->price]);
    }

    public function getMMC()
    {
        return response()->json(['data' => Mmc::all()]);
    }

    public function request(Request $obRequest, Client $obClients)
    {
        $obClient = new Client();
        $obValidatedData = $obRequest->validate([
            'id_mark' => 'required|exists:mark,id',
            'id_model' => 'required|numeric|exists:model,id',
            'cart' => 'required',
            'fio' => 'required|max:255|regex:/[А-Яа-яЁё]/u',
            'phone' => 'required|size:11',
        ], [
            'fio.regex' => 'Имя должно состоять из русских букв!',
            'phone.numeric' => 'Номер телефона должен состоять из цифр!',
            'id_mark.exists' => 'Такой марки машины нету!',
            'id_model' => 'Такой модели машины нету!',
        ], [
            'fio' => 'ФИО',
            'cart' => 'Корзина',
            'id_mark' => 'Марка',
            'id_model' => 'Модель',
            'phone' => 'Номер телефона',
            'price' => 'Цена'
        ]);
        $intMmc = Mmc::where([
            'id_mark' => $obRequest->id_mark,
            'id_model' => $obRequest->id_model,
        ])->first()->id;
        for ($i = 0; $i < count($cart = $obRequest->cart); ++$i) {
            $cart[$i]['price'] =
                ($temp = Service::where(['title' => $cart[$i]['title']])->first()->price) == $cart[$i]['price'] ?
                $cart[$i]['price'] : $temp;
        }
        if (($obClient = $obClients->where(['phone' => $obRequest->phone])->first()) === null) {
            $obClient = $obClients->fill([
                'fio' => $obRequest->fio,
                'phone' => $obRequest->phone,
            ]);
            $obClient->save();
        }
        (new Requests())->fill([
            'service' => json_encode($cart),
            'id_mmc' => $intMmc,
            'id_client' => $obClient->id,
        ])->save();
        return response()->json(['validationMessage' => 'success']);
    }

    public function getRequestsOnDay()
    {
        return response()->json(['data' => Requests::whereDate('coming_at', Carbon::today())->get()]);
    }
}
