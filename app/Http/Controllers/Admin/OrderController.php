<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;

class OrderController extends Controller
{
    public function view()
    {
        return view('admin.order');
    }

    public function update(Request $obRequest, Requests $obRequests)
    {
        $obRequests = $obRequests::where(['id' => $obRequest->id])->first();
        $obValidatedData = $obRequest->validate([
            'datetime' => 'date|required',
            'status' => 'required',
        ], [
            'required' => 'Заполните :attribute',
            'date' => 'Введите дату',
            'min' => 'Минимальная длина :attribute :value символов',
        ], [
            'datetime' => 'Время',
            'status' => 'Статус'
        ]);
        Requests::where(['id' => $obRequest->id])->update([
            'coming_at' => $obRequest->datetime,
            'status' => $obRequest->status
        ]);
        return response()->json(['validationMessage' => 'success']);
    }

    public function delete(Request $obRequest)
    {
        return Requests::where(['id' => $obRequest->id])->delete() ?
            response()->json(['validationMessage' => 'success']) : response()->json(['validationMessage' => 'failure']);
    }

    // Ajax fetch users table

    function fetch(Request $obRequest)
    {
        if ($obRequest->day !== null) {
            $arDate = explode('-', $obRequest->day);
            $obOrders = Requests::whereYear('coming_at', $arDate[0])
                ->whereMonth('coming_at', $arDate[1])
                ->whereDay('coming_at', $arDate[2])
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
        } elseif ($obRequest->status !== null) {
            $obOrders = Requests::where('status', $obRequest->status)
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
        } elseif ($obRequest->sort_type === 'with-time') {
            $obOrders = Requests::where('coming_at', '!=', null)
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
        } elseif ($obRequest->sort_type === 'without-time') {
            $obOrders = Requests::where('coming_at', '=', null)
                ->orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
        } else {
            $obOrders = Requests::orderBy('created_at')
                ->orderBy('id', 'desc')
                ->paginate(15);
        }
        return view('admin.pagination.orders', compact('obOrders'))->render();
    }
}
