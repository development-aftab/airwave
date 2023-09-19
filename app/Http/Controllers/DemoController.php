<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\EmailUser;
use Maatwebsite\Excel\Facades\Excel;
  
class DemoController extends Controller
{
    
    public function importExportView()
    {
       return view('import');
    }
   
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    public function import() 
    {
        //return request()->file('file');
        Excel::import(new UsersImport,request()->file('file'));
           
        return redirect()->back();
    }

    public function AddUser(Request $request)
    {
        EmailUser::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back();
    }
}
