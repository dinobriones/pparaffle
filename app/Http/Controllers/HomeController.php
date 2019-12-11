<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Excel;
use App\Employee;
use App\Winner;
use App\Prize;

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
        return view('home');
    }
    
    public function uploads()
    {
        return view('upload');
    }

    public function draw()
    {
        $prizes = Prize::get();
        return view('draw',compact('prizes'));
    }

    public function drawwinners(Request $request)
    {
        $user = auth()->user();
        $type = $request->type;
        $no = intval($request->no_of_winners);  

        $employees = Employee::where('status',0)->orderByRaw('RAND()')->take($no)->get();
        // dd($employees);
        if($employees) {
            foreach($employees as $employee){
                Employee::where('id',$employee->id)->update([
                    'status' => 1
                ]);
                
                Winner::create([
                    'employee_id' => $employee->id,
                    'prize_id' => $type
                ]);

            }
        }

        return redirect()->route('listwinners')->with('message','Congrats');
    }

    public function list()
    {
        $winners = Winner::paginate(10);
        // dd($winners);
        return view('listwinners',compact('winners'));
    }
    
    public function uploadcsv(Request $request)
    {
        // dd($request->all());

        $path = $request->file('csv_file')->getRealPath();
        // dd($path);
        $data = Excel::load($path)->get();
        if($data->count()){
            foreach ($data as $key => $value) {
                if($request->type == 'E'){
                $arr[] = ['name' => $value->name, 'department' => $value->department];
                } else {
                $arr[] = ['prize' => intval($value->prize)];
                }
            }
            // dd($arr);
            if(!empty($arr)){
                if($request->type == 'E'){
                    Employee::insert($arr);
                } else {
                    Prize::insert($arr);
                }
                return redirect()->back()->with('message', "Data uploaded successfully");
            }
        } else {
            //error
        }
    }
}
