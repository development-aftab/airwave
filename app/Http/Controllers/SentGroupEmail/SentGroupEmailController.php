<?php

namespace App\Http\Controllers\SentGroupEmail;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SentGroupEmail;
use App\EmailUser;
use App\Group;
use App\SentEmail;
use Mail;
use Illuminate\Http\Request;

class SentGroupEmailController extends Controller
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $sentgroupemail = SentGroupEmail::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('from', 'LIKE', "%$keyword%")
                ->orWhere('to', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                 $sentgroupemail = SentGroupEmail::with('groupdetails:id,name')->paginate($perPage);
            }

            return view('sentGroupEmail.sent-group-email.index', compact('sentgroupemail'));
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
             $send_group = Group::where('status',1)->get();
            return view('sentGroupEmail.sent-group-email.create',compact('send_group'));
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            if($request->has('group_id')){
                $emails = null;
                $group_users =  EmailUser::where('group_id',$request->group_id)->get();
                foreach($group_users as $item){
                    $SentEmail = new SentEmail();
                    $SentEmail->group_id = $request->group_id;
                    $SentEmail->from = $request->from;
                    $SentEmail->to = $item->email;
                    $SentEmail->body = $request->body;
                    $SentEmail->save();
                    $emails = $item->email;
            }

            }
            $data['body'] = $request->body;
            $data['email_type'] = $request->email_type;
            $subject = $request->subject;
            $body = $request->body;
             Mail::send('mail.content',$data, function ($message) use ($emails,$subject,$body)
              {
                $message->to($emails)->from('contact@airwavedefender.com')
                  ->subject($subject);
              });
            //return redirect('sentGroupEmail/sent-group-email')->with('flash_message', 'SentGroupEmail added!');
            return redirect('sentEmail/sent-email')->with('message', 'GroupEmail has been Sent!');
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $sentgroupemail = SentGroupEmail::findOrFail($id);
            return view('sentGroupEmail.sent-group-email.show', compact('sentgroupemail'));
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $sentgroupemail = SentGroupEmail::findOrFail($id);
            return view('sentGroupEmail.sent-group-email.edit', compact('sentgroupemail'));
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $sentgroupemail = SentGroupEmail::findOrFail($id);
             $sentgroupemail->update($requestData);

             return redirect('sentGroupEmail/sent-group-email')->with('flash_message', 'SentGroupEmail updated!');
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
        $model = str_slug('sentgroupemail','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SentGroupEmail::destroy($id);

            return redirect('sentGroupEmail/sent-group-email')->with('flash_message', 'SentGroupEmail deleted!');
        }
        return response(view('403'), 403);

    }
}
