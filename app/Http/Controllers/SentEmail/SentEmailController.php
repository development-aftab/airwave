<?php

namespace App\Http\Controllers\SentEmail;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SentEmail;
use App\EmailUser;
use App\Group;
use Mail;
use Illuminate\Http\Request;

class SentEmailController extends Controller
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $sentemail = SentEmail::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('from', 'LIKE', "%$keyword%")
                ->orWhere('to', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {

                 $sentemail = SentEmail::with('group')->orderBy('created_at','DESC')->paginate($perPage);
            }

            return view('sentEmail.sent-email.index', compact('sentemail'));
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            //$send_group = Group::where('status',1)->where('group_user','!=',null)->get();
            $send_to = EmailUser::where('status',1)->select('name','email')->get();
            return view('sentEmail.sent-email.create',compact('send_to'));
        }
        return response(view('403'), 403);

    }

    public function getEmailOptions(Request $request)
{
    // Get the offset and limit from the AJAX request
    $offset = $request->offset;
    $limit = $request->limit;

    // Retrieve the email options from the database
    $emailOptions = EmailUser::orderBy('created_at','DESC')->where('status', 1)
    ->offset($offset)
    ->limit($limit)
    ->get();

    // Generate the HTML options for the select dropdown
    $html = '';
    foreach ($emailOptions as $email) {
        $html .= '<option value="' . $email->email . '">' . $email->name . ' (' . $email->email . ')</option>';
    }
    // Return the HTML options as a response
    return response()->json($html);
    //return $html;
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $requestData = $request->all();
            //$requestData['to'] = json_encode($request->to,true);
            if($request->has('to')){
                $SentEmail = new SentEmail();
                foreach($request->to as $item){
                // SentEmail::create(["from" =>$request->from,
                // "from" =>$request->from,
                // "to" =>$item, 
                // "body" =>$request->body, 
                    
                    $SentEmail->from = $request->from;
                    $SentEmail->to = $item;
                    $SentEmail->body = $request->body;
                    $SentEmail->save();
            //]);
            }

            }
            $data['body'] = $request->body;
            $data['email_type'] = $request->email_type;
             $emails = $request->to;   
            $subject = $request->subject;
            $body = $request->body;
            // Mail::send('emails.welcome', [], function($message) use ($emails)
            // {    
            //     $message->to($emails)->subject('This is test e-mail');    
            // });
            // var_dump( Mail:: failures());
             Mail::send('mail.content',$data, function ($message) use ($emails,$subject,$body)
              {
                $message->to($emails)->from('contact@airwavedefender.com')
                  ->subject($subject);
              });
            return redirect('sentEmail/sent-email')->with('message', 'Email has been Sent!');
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $sentemail = SentEmail::findOrFail($id);
            return view('sentEmail.sent-email.show', compact('sentemail'));
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $sentemail = SentEmail::findOrFail($id);
            return view('sentEmail.sent-email.edit', compact('sentemail'));
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $sentemail = SentEmail::findOrFail($id);
             $sentemail->update($requestData);

             return redirect('sentEmail/sent-email')->with('flash_message', 'SentEmail updated!');
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
        $model = str_slug('sentemail','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SentEmail::destroy($id);

            return redirect('sentEmail/sent-email')->with('flash_message', 'SentEmail deleted!');
        }
        return response(view('403'), 403);

    }
}