<?php
 
namespace App\Http\Controllers;
use App\Models\Departments; //add Departments Model
use App\Models\Employees; //add Employees Model
use App\Models\Message;

 
use Illuminate\Http\Request;
 
class DepartmentsController extends Controller
{
    // public function indexs(){
 
    //     // Fetch departments
    //     $departmentData['data'] = Departments::orderby("name","asc")
    //        ->select('id','name')
    //        ->get();
 
    //     // Load index view
    //     return view('user.selector')->with("departmentData",$departmentData);
    // }
 
    // // Fetch records
    // public function getEmployees($departmentid=0){
 
    // // Fetch Employees by Departmentid
    //     $empData['data'] = Employees::orderby("name","asc")
    //     ->select('id','name')
    //     ->where('department',$departmentid)
    //     ->get();
   
    //     return response()->json($empData);
      
    // }


    public function index()
    {
        // Retrieve messages
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }


      public function store(Request $request)
    {
        // Validation
        $request->validate([
            'user_id' => 'required',
            'content' => 'required',
        ]);

        // Create message
        Message::create($request->all());

        // Redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully.');
    }


    
}   