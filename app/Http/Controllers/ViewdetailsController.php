<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitorsdetails;
use Illuminate\Support\Facades\Auth;


class ViewdetailsController extends Controller
{
    //


   public function __construct()
   {
       $this->middleware(['auth','verified']);
   }



public function index ()
{

    $all_records = Visitorsdetails::all();
    $data = [];
    $data['alldetail'] = $all_records;

    return view('admin.userdetails', $data);

}

}
