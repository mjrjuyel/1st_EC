<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Basic;
use App\Models\SocialMedia;
use App\Models\ContactInformation;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ManageController extends Controller{

    public function basic(){

    }

    public function basic_update(){

    }

    public function contact(){
    $contact=ContactInformation::where('ci_status',1)->first();
      return view('admin.manage.contact',compact('contact'));
    }

    public function contact_update(Request $request){
    $editor=Auth::user()->id;
      $update=ContactInformation::where('ci_status',1)->where('id',1)->update([
        'ci_phone1'=>$request['phone1'],
        'ci_phone2'=>$request['phone2'],
        'ci_email1'=>$request['email1'],
        'ci_email2'=>$request['email2'],
        'ci_add1'=>$request['add1'],
        'ci_add2'=>$request['add1'],
        'ci_creator'=>$editor,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Contact Info uploaded');
        return redirect()->back();
      }else{
        Session::flash('error','value');
        return redirect('dashboard/manage/contact');
      }
    }

    public function social(){
      $social=SocialMedia::where('sm_status',1)->first();
      return view('admin.manage.social',compact('social'));
    }

    public function social_update(Request $request){
      $editor=Auth::user()->id;
      $update=SocialMedia::where('sm_status',1)->where('id',1)->update([
        'sm_facebook'=>$request['facebook'],
        'sm_x'=>$request['twitter'],
        'sm_linkedin'=>$request['linkedin'],
        'sm_youtube'=>$request['youtube'],
        'sm_pinterest'=>$request['pinterest'],
        'sm_vimeo'=>$request['vimeo'],
        'sm_instagram'=>$request['instagram'],
        'sm_whatsapp'=>$request['whatsapp'],
        'sm_skype'=>$request['skype'],
        'sm_flickr'=>$request['flickr'],
        'sm_creator'=>$editor,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Session::flash('success','Social Media Info uploaded');
        return redirect()->back();
      }else{
        Session::flash('error','value');
        return redirect('dashboard/manage/social');
      }
    }

    public function copyright(){

    }

    public function copyright_update(){

    }
}
