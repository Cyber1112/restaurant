<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\FoodChef;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user(){
        $data = user::all();
        return view("admin.users", compact("data"));
    }

    public function foodMenu(){
        $data = food::all();
        return view("admin.foodmenu", compact('data'));
    }

    public function uploadFood(Request $request){
        
        $data = new food();
        
        $image = $request->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();

        return redirect()->back();

    }

    public function deleteUser($id){
        $data = user::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function deleteFood($id){
        $data = food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateView($id){
        $data = food::find($id);

        return view('admin.updateview', compact('data'));
    }

    public function update(Request $request, $id){
        $data = food::find($id);


        
        $image = $request->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();

        return redirect()->back();
    }

    public function reservation(Request $request){

        $data = new reservation;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;

        $data->save();

        return redirect()->back();
    }

    public function viewReservation(){
        if ( Auth::id() ){
            $data = reservation::all();
            return view("admin.admin_reservation", compact('data')); 
        }
        return redirect('login');

        
    }
    public function viewChef(){
        $data = foodchef::all();
        return(view("admin.adminchef",  compact('data')));
    }

    public function uploadChef(Request $request){
        $data = new foodchef();
        
        $image = $request->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);

        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $data->save();

        return redirect()->back();
    }

    public function deleteChef($id){
        $data = foodchef::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateChef($id){
        $data = foodchef::find($id);

        return view('admin.updatechef', compact('data'));
    }

    // renewChef
    public function renewChef(Request $request, $id){
        $data = foodchef::find($id);


        
        $image = $request->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);

        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;


        $data->save();

        return redirect()->back();
    }

    public function orders(){
        $data = order::all();
        return(view("admin.orders", compact('data')));
    }
   
    public function search(Request $request){
        $search = $request->search;

        $data = order::where('name', 'Like', '%'.$search.'%')->get();
        return(view("admin.orders", compact('data')));
    }

}
