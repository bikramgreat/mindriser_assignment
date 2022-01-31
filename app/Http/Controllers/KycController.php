<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KycController extends Controller
{
    private $kyc;
    public function __construct()
    {
        $this->kyc=new Kyc();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kyc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validates kyc form data
        $validated_data= $this->validate($request,
            array(
                'full_name'=>['required','min:2','max:255'],
                'address'=>['required','min:2','max:255'],
                'phone'=>['required','unique:kycs,phone','max:10','min:10'],
                'education'=>['required','min:2','max:255'],
                'education_per'=>['required','min:2','max:255'],
                'photo'=>'required|mimes:png,jpg,jpeg|max:2048',
                'citizenship_doc'=>'required|mimes:png,jpg,jpeg,pdf|max:2048'
            )
        );
        //store validated data in $data variable
        $this->kyc->user_id=Auth::id();
        $this->kyc->full_name=$validated_data['full_name'];
        $this->kyc->address=$validated_data['address'];
        $this->kyc->phone=$validated_data['phone'];
        $this->kyc->education=$validated_data['education'];
        $this->kyc->education_per=$validated_data['education_per'];
        if($request->hasFile('citizenship_doc')){
            $file = $request->file('citizenship_doc');
            $destinationPath = 'documents/user_citizenships';
            $originalFile = $file->getClientOriginalName();
            $fileExtension=$request->file('citizenship_doc')->extension();
            $filename=Auth::user()->id.Auth::user()->name.'.'.$fileExtension;
            $file->move($destinationPath, $filename);
            $this->kyc->photo=$destinationPath.'/'.$filename;
        }

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'documents/user_images';
            $originalFile = $file->getClientOriginalName();
            $fileExtension=$request->file('photo')->extension();
            $filename=Auth::user()->id.Auth::user()->name.'.'.$fileExtension;
            $file->move($destinationPath, $filename);
            $this->kyc->citizenship=$destinationPath.'/'.$filename;
        }

        if($this->kyc-> save())
        {
            //if kyc data is saved
            return redirect('kyc/profile/'.Auth::id());
        }

        else
        {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->kyc->where('id',$id)->update(['status'=>1]))
        {
            return redirect('dashboard');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $kyc=$this->kyc->where('user_id',Auth::user()->id)->get();
        return view('kyc.profile',compact('kyc'));
    }
}
