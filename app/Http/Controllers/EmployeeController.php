<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
class EmployeeController extends Controller
{

    public function index(Request $request)

    {  
        // if($request->ajax()) {
          
          
        // $data = Student::where('firstname', 'LIKE', $request->country.'%')
        //     ->get();
       
        // $output = '';
       
        // if (count($data)>0) {
          
        //     $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
          
        //     foreach ($data as $row){
               
        //         $output .= '<li class="list-group-item">'.$row->name.'</li>';
        //     }
          
        //     $output .= '</ul>';
        // }
        // else {
         
        //     $output .= '<li class="list-group-item">'.'No results'.'</li>';
        // }
        // return $output;
    // }
        $employees = Student::all();
        return view('employees.index',['employees'=>$employees]);
    }
    public function search(Request $request)
    {
        if(!empty($request->get('search'))){
           
        $search = $request->get('search');
        $employees = Student::where('firstname',$search)->get();
        }
        else{
            $employees = Student::get();
        }
        return view('employees.index',['employees'=>$employees]);
    }
    public function sort(Request $request)
    {
        $search = $request->get('sort');
        if(($request->get('sort')=='ASC')){

             $employees = Student::orderBy('created_at', 'ASC')->get();
        }
        else{
            $employees = Student::orderBy('created_at', 'DESC')->get();
        }
        return view('employees.index',['employees'=>$employees]);
    }
    public function create()
    {
        
        return view('employees.create');
    }
  
    public function store(Request $request)
    {
      
        $request->validate([
         
            'image'         => 'mimes:jpeg,png',
        ]);
        $employee = new Student();
        if(!empty($request->file('image'))){
         
            $path = $request->file('image')->store('public/avatars');
            $employee->photo = $path;
        }
       
        $employee->uid = 'STU';
        $employee->firstname = $request->input('firstname');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        $employee->department = $request->input('department');
        $employee->phone = $request->input('phone');
       
      
        $employee->save(); 
        Student::where('id',$employee['id'])->update(['uid'=>'STU_'.$employee['id']]);
      
        return redirect()->route('employees.index')->with('info','Employee Added Successfully');
    }
 
    public function edit($id)
    {
      
        $employee = Student::find($id);
        return view('employees.edit',['employee'=> $employee]);
    }

    public function update(Request $request)
    {
      
    $employee = Student::find($request->input('id'));
      if(!empty($request->file('image'))){
         
          $path = $request->file('image')->store('public/avatars');
          $employee->photo = $path;
      }
      
        $employee->firstname = $request->input('firstname');
        $employee->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        
        $employee->save(); 
        return redirect()->route('employees.index')->with('info','Employee Updated Successfully');
    }

    public function destroy($id)
    {
       
        $employee = Student::find($id);
        
        $employee->delete();
        return redirect()->route('employees.index');
    }
}