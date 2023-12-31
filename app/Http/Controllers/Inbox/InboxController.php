<?php

namespace App\Http\Controllers\Inbox;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Inbox;
use Illuminate\Http\Request;
use Mail;
use Webklex\IMAP\Facades\Client;

class InboxController extends Controller
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 10;

            if (!empty($keyword)) {
                $inbox = Inbox::where('recepient', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                
                try{
                    $inbox = Inbox::orderBy('created_at','DESC')->paginate($perPage);
                    }catch(Exception $e){
                    return redirect()->back()->with(['title' => 'error', 'msg' => 'Something Went Wrong Please try Again', 'type' => 'Oops']);
                    }     
            }
            return view('inbox.inbox.index',compact('inbox'));
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('inbox.inbox.create');
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Inbox::create($requestData);
            return redirect('inbox/inbox')->with('message', 'Inbox added!');
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $inbox = Inbox::findOrFail($id);
            return view('inbox.inbox.show', compact('inbox'));
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $inbox = Inbox::findOrFail($id);
            return view('inbox.inbox.edit', compact('inbox'));
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $inbox = Inbox::findOrFail($id);
             $inbox->update($requestData);

             return redirect('inbox/inbox')->with('flash_message', 'Inbox updated!');
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
        $model = str_slug('inbox','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Inbox::destroy($id);

            return redirect('inbox/inbox')->with('flash_message', 'Inbox deleted!');
        }
        return response(view('403'), 403);

    }
}
