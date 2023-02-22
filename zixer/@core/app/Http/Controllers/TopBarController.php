<?php

namespace App\Http\Controllers;

use App\SocialIcons;
use App\SupportInfo;
use Illuminate\Http\Request;

class TopBarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){

        $all_social_icons = SocialIcons::all();
        $all_support_info = SupportInfo::all();
        return view('backend.pages.top-bar')->with([
            'all_social_icons' => $all_social_icons,
            'all_support_info' => $all_support_info
        ]);
    }
    public function new_support_info(Request $request){
        $this->validate($request,[
            'details' => 'required|string',
            'title' => 'required|string|max:191',
            'icon' => 'required|string|max:191'
        ]);

        SupportInfo::create($request->all());
        return redirect()->back()->with([
            'msg' => 'New Support Info Item Added..',
            'type' => 'success'
        ]);
    }
    public function update_support_info(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'details' => 'required|string',
            'title' => 'required|string|max:191',
            'icon' => 'required|string|max:191'
        ]);

        SupportInfo::find($request->id)->update([
            'details' => $request->details,
            'title' => $request->title,
            'icon' => $request->icon,
        ]);
        return redirect()->back()->with([
            'msg' => 'Support Info Item Updated..',
            'type' => 'success'
        ]);
    }
    public function delete_support_info(Request $request,$id){

        SupportInfo::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Support Info Item Deleted..',
            'type' => 'danger'
        ]);
    }

    public function new_social_item(Request $request){
        $this->validate($request,[
           'icon' => 'required|string',
           'url' => 'required|string',
        ]);

        SocialIcons::create($request->all());

        return redirect()->back()->with([
            'msg' => 'New Social Item Added...',
            'type' => 'success'
        ]);
    }
    public function update_social_item(Request $request){
        $this->validate($request,[
           'icon' => 'required|string',
           'url' => 'required|string',
        ]);

        SocialIcons::find($request->id)->update([
            'icon' => $request->icon,
            'url' => $request->url,
        ]);

        return redirect()->back()->with([
            'msg' => 'Social Item Updated...',
            'type' => 'success'
        ]);
    }
    public function delete_social_item(Request $request,$id){
        SocialIcons::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Social Item Deleted...',
            'type' => 'danger'
        ]);
    }
}
