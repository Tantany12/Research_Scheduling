<?php

namespace App\Http\Controllers;

use App\Models\Datas;
use App\Models\User;




class AdminController extends Controller
{
    public function index()
    {
        $researchData = Datas::all();
        return view('admin', ['researchData' => $researchData]);
    }

    
    public function dashboard()
    {
        $data = Datas::count();
        $datas = User::count();
        $users = User::where('usertype','Student');
        $user1 = User::where('usertype','Admin');

        return view ('/dashboard', compact('data','datas','users','user1'));
    }



   
}
