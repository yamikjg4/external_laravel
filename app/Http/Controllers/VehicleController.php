<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Insert data view
    public function index()
    {
        return view('welcome');
    }
    // Insert
    public function store(Request $req){
        $vehicle=new vehicle();
        $vehicle->name=$req->input('name');
        $vehicle->price=$req->input('price');
        $vehicle->fuel_capacity=$req->input('fuel_capacity');
        $vehicle->milage=$req->input('milage');
        $vehicle->save();
        return redirect()->back()->with('status','Insert Sucessfully');
     }
    //  View vehicle
     public function show(){
         $vehicle=vehicle::all();
         return view('index',compact('vehicle'));
     }
    //  Update
     public function update(Request $req,vehicle $vehicle){
        $vehicle->update($req->all());
        return redirect()->back()->with('status','Update sucessfully');
     }
    //  Delete
     public function destroy(vehicle $vehicle){
         $vehicle->delete();
         return redirect()->back()->with('status','delete sucessfully');
     }
}
