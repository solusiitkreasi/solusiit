<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_subscriber = Newsletter::all();

        return view('backend.newsletter.index')->with(['all_subscriber' => $all_subscriber]);
    }

    public function send_mail(Request $request){
        $this->validate($request,[
           'email' => 'required|email',
           'subject' => 'required',
           'message' => 'required',
        ]);

        if (sendSubscriberEmail($request->email, $request->subject,  $request->message)){
            return redirect()->back()->with([
                'msg' => 'Mail Send Success...',
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => 'Something Wrong, Please Try Again!!',
            'type' => 'danger'
        ]);
    }
    public function delete($id){
        Newsletter::find($id)->delete();
        return redirect()->back()->with(['msg' => 'Subscriber Delete Success....','type' => 'danger']);
    }

    public function send_mail_all_index(){
        return view('backend.newsletter.send-main-to-all');
    }

    public function send_mail_all(Request $request){
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required',
        ]);
        $all_subscriber = Newsletter::all();

        foreach ($all_subscriber as $subscriber){
            sendSubscriberEmail($subscriber, $request->subject,  $request->message);
        }

        return redirect()->back()->with([
                'msg' => 'Mail Send Success..',
                'type' => 'success'
            ]);
    }
}
