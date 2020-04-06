<?php

namespace App\Http\Controllers;

use App\TravelCategory;
use Illuminate\Http\Request;

class TravelCategoryController extends Controller
{
    public function index(){
        return TravelCategory::all();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $validData = $request->validate([
            'name'=>'required',
        ]);
        $store = new TravelCategory();
        $store->name = $validData['name'];
        $store->save();
        return TravelCategory::findOrFail($store->id);
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
        TravelCategory::findOrFail($id)->delete();
    }
}
