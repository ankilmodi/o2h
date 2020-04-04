<?php

namespace App\Http\Controllers;

use App\Companie;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;

class EmployeeController extends Controller
{
    /**
    * auth construct
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $employees = Employee::with('Companie')->latest()->paginate(10);
            return view('employee.index_employee',compact('employees'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        } catch (Exception $e) {
            return false;
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
             $companies = Companie::pluck('name','id')->toArray();
             return view('employee.create_employee', compact('companies')); 
        } catch (Exception $e) {
            return false;
        }       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      

         $this->validate($request, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'email',
            'phone' => 'numeric',
        ));

        try {

             Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_id' => $request->company_id,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

             return redirect('/employee')->with('message', 'Companie Added Successfully!');

         } catch (Exception $e) {
            return false;
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $employee = Employee::with('Companie')->where('id', $id)->first();
            return view('employee.show_employee', compact('employee'));
        } catch (Exception $e) {
            return false;
        }     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $companies = Companie::pluck('name','id')->toArray();
            $employee = Employee::where('id', $id)->first();
            return view('employee.edit_employee', compact('employee','companies'));
        } catch (Exception $e) {
            return false;
        }      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'email',
            'phone' => 'numeric',
        ));

        try {

            $employee = Employee::where('id',$id)->first();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company_id;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();

            return redirect('/employee')->with('message', 'Successfully Employee Updated!');

         } catch (Exception $e) {
            return false;
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        try {
            Employee::find($id)->delete();
            return redirect('/employee')->with('message', 'Successfully Employee Delete!');
        } catch (Exception $e) {
            return false;
        }   
    }
   
}