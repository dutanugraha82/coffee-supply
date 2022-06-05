<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'coffeetype' => 'required',
            'origincoffee' => 'required',
            'weight' => 'required',
            'itemcode' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validate();
        Inventory::create([
            'coffeetype' => $validated['coffeetype'],
            'origincoffee' => $validated['origincoffee'],
            'weight' => $validated['weight'],
            'itemcode' => $validated['itemcode']

        ]);

        return response()->json([
            'messages' => 'Data Berhasil Ditambahkan'
        ])->setStatusCode(200);
    }
    
    public function show(){
        $inventory = Inventory::all();
        return response()->json($inventory)->setStatusCode(200);
    }

    public function detail($id){
        $inventory = Inventory::find($id);
        if ($inventory){
            return response()->json($inventory)->setStatusCode(200);
        }
        return response()->json([
            'messages' => 'Data is not found'])->setStatusCode(404);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'coffeetype' => 'required',
            'origincoffee' => 'required',
            'weight' => 'required',
            'itemcode' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json()->setStatusCode(422);
        }
        $validated = $validator->validated();
        $checkInventory = Inventory::find($id);

        if ($checkInventory){
            Inventory::where('id',$id)->update([
                'coffeetype' => $validated['coffeetype'],
                'origincoffee' => $validated['origincoffee'],
                'weight' => $validated['weight'],
                'itemcode' => $validated['itemcode']
            ]);

            return response()->json([
                'messages' => 'update success!'
            ])->setStatusCode(200);
        }

        return response()->json([
            'messages' => 'update failed,item not found!'
        ])->setStatusCode(404);
    }

    public function delete($id){
        $checkInventory = Inventory::find($id);
        if($checkInventory){
            Inventory::destroy($id);
            return response()->json([
                'messages' => 'Delete Success!'
            ])->setStatusCode(200);
        }
        return response()->json([
            'messages' => 'Delete Failed, Item not found!'
        ])->setStatusCode(404);
    }
}
