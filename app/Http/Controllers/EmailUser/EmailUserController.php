<?php

namespace App\Http\Controllers\EmailUser;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EmailUser;
use Illuminate\Http\Request;
use App\Group;
use Mail;

class EmailUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 100;

            if (!empty($keyword)) {
                $emailuser = EmailUser::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                 $emailuser = EmailUser::with('group')->orderBy('created_at','DESC')->paginate($perPage);
            }

            return view('emailUser.email-user.index', compact('emailuser'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $groups=Group::get();
             //    Mail::raw('Hi, welcome user local!', function ($message) {
              //     $message->to('shahbazraza.tafsol@gmail.com')->from('jahmed@datalushq.com')
              //     ->subject('DHQ');
              // });

            return view('emailUser.email-user.create', compact('groups'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            EmailUser::create($requestData);
            return redirect('emailUser/email-user')->with('flash_message', 'EmailUser added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $emailuser = EmailUser::findOrFail($id);
            return view('emailUser.email-user.show', compact('emailuser'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $groups=Group::get();
            $emailuser = EmailUser::findOrFail($id);
            return view('emailUser.email-user.edit', compact('emailuser', 'groups'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $emailuser = EmailUser::findOrFail($id);
             $emailuser->update($requestData);

             return redirect('emailUser/email-user')->with('flash_message', 'EmailUser updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('emailuser','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            EmailUser::destroy($id);

            return redirect('emailUser/email-user')->with('flash_message', 'EmailUser deleted!');
        }
        return response(view('403'), 403);

    }
}
