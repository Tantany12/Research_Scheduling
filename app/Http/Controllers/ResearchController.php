<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Datas;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchData = Datas::get();

        return view('/seeSchedule', compact('researchData'));
    }

    public function dashboard()
    {
        $data = Datas::count();
        $datas = User::count();
        $users = User::where('usertype','Student')->count();
        $user1 = User::where('usertype','Admin')->count();

        return view ('/dashboard', compact('data','datas','users','user1'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'exampleInputEmail' => 'required', 'string', 'email', 'max:255', 'unique:datas',
            'course'  => 'required', 'string', 'max:20',
            'researcherName' => 'required', 'string', 'max:50',
            'contactNumber' => 'required', 'string', 'max:11',
            'researchTitle' => 'required', 'string', 'max:100', 'unique:datas',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Example validation for file upload


        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // Handle file upload and storage logic here
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
        } else {
            // Handle the case where no file was uploaded
            // You can add validation for this in your form as well
            $fileName = null; // Set to null or any appropriate value
        }

        Datas::create([
            'exampleInputEmail' => $request->exampleInputEmail,
            'course' => $request->course,
            'researcherName' => $request->researcherName,
            'contactNumber' => $request->contactNumber,
            'researchTitle' => $request->researchTitle,
            'DateofDefense' => $request->DateofDefense,
            'TimeOfDefense' => $request->TimeOfDefense,
            'ResearchPanel' => $request->ResearchPanel,
            'original_name' => $fileName ? $file->getClientOriginalName() : null,
            'file_path' => $fileName,   
        ]);
        Session::flash('success_message', "Research successfuly submitted!");
        return redirect('/seeSchedule');
    }

    public function search(Request $req)
    {
        $searchData = $req->get('search');
        $data = DB::table('datas')->where('researchTitle', 'LIKE', '%' . $searchData . '%')
        ->orWhere('ResearchPanel', 'LIKE', '%' . $searchData . '%') 
        ->orWhere('course', 'LIKE', '%' . $searchData . '%')->paginate();
        return view('searchData', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editData($id)
    {
        $data = DB::table('datas')->all();
        return view('/editData', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $req, $id)
    {
        $req->validate([
            'researchTitle' => 'required',
            'DateOfDefense' => 'required',
            'TimeOfDefense' => 'required',
            'ResearchPanel' => 'required',
        ]);

        $data = DB::table('datas')->where('id', $id)
            ->update([
                'researchTitle' => $req->researchTitle,
                'DateOfDefense' => $req->DateOfDefense,
                'TimeOfDefense' => $req->TimeOfDefense, 
                'ResearchPanel' => $req->ResearchPanel,
            ]);
        Session::flash('success_message', 'Data Updated Successfully');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $delete = DB::table('datas')->where('id', $id)->delete();

        Session::flash('success_message', 'Data Deleted Successfully');
        return redirect('/admin');
    }


    public function adminData () 
    {
        $researchData = Datas::all();

        return view('/adminSchedule',compact('researchData'));
    }

    public function pagination_Admin()
    {
    // Assuming you're using Eloquent ORM
    $researchData = Datas::paginate(10); 
    return view('/adminSchedule', compact('researchData'));
    }



    public function viewData($fileName)
    {
        $pdfPath = public_path('uploads/'. $fileName);

        return response()->file($pdfPath);
    }

    public function adminScheduleAdmin()
    {
        // Assuming you're using Eloquent ORM
        $researchData = Datas::whereNotNull('TimeOfDefense')->get();

        return view('/adminSchedule', compact('researchData'));
    }
}