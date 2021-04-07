<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function fetch(Request $obRequest)
    {
        if ($obRequest->ajax()) {
            $obOrders = Client::where(['id' => $obRequest->id])->first()
                ->requests()
                ->orderBy('id', 'desc')
                ->paginate(40);
            return view('admin.pagination.client', compact('obOrders'))->render();
        }
    }
}
