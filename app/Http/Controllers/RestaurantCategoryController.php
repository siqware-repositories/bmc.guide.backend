<?php

namespace App\Http\Controllers;

use App\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index(){
        return RestaurantCategory::all();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $validData = $request->validate([
            'name'=>'required',
        ]);
        $store = new RestaurantCategory();
        $store->name = $validData['name'];
        $store->save();
        return RestaurantCategory::findOrFail($store->id);
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        RestaurantCategory::findOrFail($id)->delete();
    }
}
