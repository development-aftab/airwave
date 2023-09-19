<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SentEmail;
use App\EmailUser;
use App\Campaign;
use App\Inbox;
use Webklex\IMAP\Facades\Client;
use Webklex\IMAP\Facades\FolderCollection;
use Mail;

class WebsiteController extends Controller
{
    public function manageUsers(){
    	return view('dashboard.manage_users');
    }
     public function inboxCron(){
      try{
       $client = Client::account('default');
       $client->connect();
       $folders = $client->getFolders('INBOX');
       $paginator = $paginator = $folders->paginate($per_page = 5, $page = null, $page_name = 'imap_page');
       foreach($folders as $folder){
        $messages = $folder->messages()->all()->get();
        foreach($messages as $message){
         $newUser = Inbox::updateOrCreate([
          'uid'   => $message->getUid(),
        ],[
          'uid'   => $message->getUid(),
          'from'     => $message->getFrom()[0]->mail,
          'subject' => $message->getSubject(),
          'text_body'    => $message->hasTextBody(),
          'html_body'   => $message->getHTMLBody(),
          'attachment_count' => $message->getAttachments()->count(),
          'email_date' => $message->getDate()
        ]);
       }
     }
     $client->disconnect();
     //dd('done');

   }catch(Exception $e){
    return redirect()->back()->with(['title' => 'error', 'msg' => 'Something Went Wrong Please try Again', 'type' => 'Oops']);
  }

    }

    public function sendCampaigns($id){
     $campaign = Campaign::findOrFail($id);
     $send_to = EmailUser::where('status',1)->get(); 
      return view('dashboard.send_campaign',compact('campaign','send_to'));
    }
    public function postCampaign(Request $request){

      $requestData = $request->all();
        if($request->has('to')){
                foreach($request->to as $item){
                SentEmail::create([
                "from" =>'contact@airwavedefender.com',
                "title" =>$request->title,
                "campaign_id" =>$request->campaign_id,
                "to" =>$item, 
                "subject" =>$request->subject, 
                "body" =>$request->body, 
            ]);
            }
            }
            $data['body'] = $request->body;
            $data['email_type'] = $request->email_type;
             $emails = $request->to;   
            $subject = $request->subject;
            $body = $request->body;
             Mail::send('mail.content',$data, function ($message) use ($emails,$subject,$body)
              {
                $message->to($emails)->from('contact@airwavedefender.com')
                  ->subject($subject);
              });
          return redirect('sentEmail/sent-email')->with('flash_message', 'Campaign has been Sent!');

    }

    public function groups(){
    	return view('dashboard.groups');
    }

    public function addGroups(){
    	return view('dashboard.add_groups');
    }

    public function editGroups(){
    	return view('dashboard.edit_groups');
    }

    public function mailInbox(){
    	return view('dashboard.mail_inbox');
    }

    public function mailSent(){
    	return view('dashboard.mail_sent');
    }

    public function viewEmail(){
    	return view('dashboard.view_email');
    }

    public function allCampaigns(){
    	return view('dashboard.all_campaigns');
    }

    public function sendEmail(){
    	return view('dashboard.send_email');
    }

    public function createCampaign(){
    	return view('dashboard.create_campaign');
    }

    public function editCampaign(){
    	return view('dashboard.edit_campaign');
    }

    public function sendCampaign(){
    	return view('dashboard.send_campaign');
    }

    public function campaignLogs(){
    	return view('dashboard.campaign_logs');
    }

    public function viewCampaignLogs(){
    	return view('dashboard.view_campaign_logs');
    }

    public function emailLogs(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sendgrid.com/v3/messages?limit=1000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: bearer '
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result =  json_decode($response,true);
        return view('dashboard.email_logs',compact('result'));
    }

//    public function dashboard()
//    {
//
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//          CURLOPT_URL => 'https://console.sendlayer.com/api/v1/events?StartFrom=0&RetrieveCount=50',
//          CURLOPT_RETURNTRANSFER => true,
//          CURLOPT_ENCODING => '',
//          CURLOPT_MAXREDIRS => 10,
//          CURLOPT_TIMEOUT => 0,
//          CURLOPT_FOLLOWLOCATION => true,
//          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//          CURLOPT_CUSTOMREQUEST => 'GET',
//          CURLOPT_HTTPHEADER => array(
//            'Authorization: Bearer 1C918580-6CEFBA1E-238B005A-BEE4B53B',
//            'Content-Type: application/json',
//            'Cookie: PHPSESSID=aluj2hp5ru9itfks3t2n0t0uc0'
//        ),
//      ));
//
//        $response = curl_exec($curl);
//        curl_close($curl);
//          $result =  json_decode($response,true);
//          // dd($result['Events']);
//        return view('dashboard.index',compact('result'));
//
//    }

    public function dashboard()
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sendgrid.com/v3/messages?limit=10',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: bearer '
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
          $result =  json_decode($response,true);
        //$count =  Controller::stats();

        return view('dashboard.index',compact('result'));

    }


}