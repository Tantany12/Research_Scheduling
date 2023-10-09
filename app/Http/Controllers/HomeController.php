<?php

namespace App\Http\Controllers;
use App\Models\Datas;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }

    public function researchData()
    {
        // Assuming you are retrieving your data like this in your controller
        $researchData = Datas::all();
        return view('/seeSchedule',compact('researchData'));

        
    }


public function paginationLinks()
{
    // Assuming you're using Eloquent ORM
    $researchData = Datas::paginate(10); 
    return view('/seeSchedule', compact('researchData'));
}

}
