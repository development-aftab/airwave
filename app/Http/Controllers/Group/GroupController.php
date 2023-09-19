<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Group;
use App\EmailUser;
use App\Imports\GroupImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $group = Group::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $group = Group::with('groupEmails')->paginate($perPage);
            }

            return view('group.group.index',compact('group'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $user = EmailUser::all();
            return view('group.group.create',compact('user'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $group = Group::create($requestData);
            Excel::import(new GroupImport($group), request()->file('file'));
            //if($request->group_user){
            //$requestData['group_user'] = json_encode($request->group_user??[0],true);
            //}
            return redirect('group/group')->with('message', 'Group added!');
        }
        return response(view('403'), 403);
    }

    public function singleGroupEmail(Request $request)
    {
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            $group = EmailUser::create($requestData);
            return redirect('group/group')->with('message', 'Email has been Add in Group!');
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
             $group = Group::findOrFail($id)->load('groupEmails');
            return view('group.group.show', compact('group'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $group = Group::findOrFail($id);
             $user = EmailUser::where('group_id',$id)->get();
            return view('group.group.edit', compact('group','user'));
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            $group = Group::findOrFail($id);
             $group->update($requestData);
            //   if($request->group_user){
            // $requestData['group_user'] = json_encode($request->group_user??[0],true);
            // }
             if ($request->has('group_user')) {
                $selectedEmails = $request->input('group_user');
                $emailUsers = EmailUser::where('group_id', $id)->get();

                $emailUsers->each(function ($emailUser) use ($selectedEmails, $id) {
                    if (!in_array($emailUser->email, $selectedEmails)) {
                        $emailUser->update(['group_id' => null]);
                    }
                });
                collect($selectedEmails)->each(function ($email) use ($id) {
                    EmailUser::updateOrCreate(['email' => $email], ['group_id' => $id]);
                });
            }

             return redirect('group/group')->with('flash_message', 'Group updated!');
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
        $model = str_slug('group','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Group::destroy($id);

            return redirect('group/group')->with('flash_message', 'Group deleted!');
        }
        return response(view('403'), 403);

    }
}
