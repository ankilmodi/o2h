<?php

namespace App\Http\Controllers;

use App\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Storage;


class CompanieController extends Controller
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
             $companies = Companie::latest()->paginate(10);
            return view('companie.index_companie',compact('companies'))
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
            return view('companie.create_companie'); 
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
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:max_width:100,max_height:100'
        ));

        try {   

             $imageName = time().'.'.request()->logo->getClientOriginalExtension();
             request()->logo->move(public_path('storage/app/public'), $imageName);
             
             Companie::create([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $imageName,
            ]);

            return redirect('/companie')->with('message', 'Companie Added Successfully!');

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
            $companie = Companie::where('id', $id)->first();
            return view('companie.show_companie', compact('companie'));
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
            $companie = Companie::where('id', $id)->first();
            return view('companie.edit_companie', compact('companie'));
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
            'name' => 'required',
            'email' => 'email',
            'logo' => 'dimensions:max_width:100,max_height:100'
        ));

         try {

            if(!empty($request->logo)){
                $imageName = time().'.'.request()->logo->getClientOriginalExtension();
                request()->logo->move(public_path('storage/app/public'), $imageName);
            }else{
                $imageName = $request->old_logo;
            }

            $companie = Companie::where('id',$id)->first();
            $companie->name = $request->name;
            $companie->email = $request->email;
            $companie->website = $request->website;
            $companie->logo = $imageName;
            $companie->save();

            return redirect('/companie')->with('message', 'Successfully Companie Updated!');

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
            Companie::find($id)->delete();
            return redirect('/companie')->with('message', 'Successfully Companie Delete!');
        } catch (Exception $e) {
            return false;
        }
    }

}