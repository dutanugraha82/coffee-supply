<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Psy\Input\ShellInput;

class DeliveryController extends Controller
{
    public function index()
    {
        $delivery = DB::table('order')->orderBy('shipoption','desc')->get();
        return view('delivery', compact('delivery'));
    }

    public function create(){
        return view('input-delivery');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'coffee_type' => 'required',
            'weight' => 'required',
            'origin_coffee' => 'required',
            'itemcode' => 'required',
            'shipoption' => 'required'
        ],
        [
            'coffee_type.required' => 'Must be fill',
            'weight.required' => 'Must be fill',
            'origin_coffee.required' => 'Must be fill',
            'itemcode.required' => 'Must be fill',
            'shipoption.required' => 'Must be fill'
        ]
    );
        DB::table('order')->insert([
            'coffee_type' => $request['coffee_type'],
            'weight' => $request['weight'],
            'origin_coffee' => $request['origin_coffee'],
            'itemcode' => $request['itemcode'],
            'shipoption' => $request['shipoption']
        ]);

        return redirect('/');

    }

    public function edit($id){
        $order = DB::table('order')->where('id', $id)->first();
        return view('edit-delivery', compact('order'));
    }

    public function update($id, Request $request){
        $request->validate([
            'coffee_type' => 'required',
            'weight' => 'required',
            'origin_coffee' => 'required',
            'itemcode' => 'required',
            'shipoption' => 'required'
        ]);

        DB::table('order')->where('id', $id)->update([
            'coffee_type' => $request['coffee_type'],
            'weight' => $request['weight'],
            'origin_coffee' => $request['origin_coffee'],
            'itemcode' => $request['itemcode'],
            'shipoption' => $request['shipoption']
        ]);

        return redirect('/');
    }

    public function delete($id){
        DB::table('order')->where('id','=',$id)->delete();
        return redirect('/');
    }
}
