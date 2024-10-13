<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Smtp;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

class SettingController extends Controller
{
    public function seo(){
        $seo = DB::table('seos')->first();
        return view('admin.setting.seo.index',compact('seo'));
    }

    public function seoUpdate(Request $request){
        $id=$request['id'];
        // return $request->all();
        $update=Seo::where('id',$id)->update([
            'meta_title'=>$request['title'],
            'meta_author'=>$request['author'],
            'meta_tag'=>$request['tags'],
            'meta_description'=>$request['description'],
            'meta_keywords'=>$request['keywords'],
            'alexa_verification'=>$request['alexa'],
            'google_verification'=>$request['verification'],
            'google_analytic'=>$request['analytic'],
            'google_adsense'=>$request['adsense'],
            'seo_editor'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
        ]);

        if($update){
            Session::flash('success','SEO Setting has updated!');
            return redirect()->back();
        }
    }

    public function smtp(){
        $smtp = DB::table('smtps')->first();
        return view('admin.setting.smtp.index',compact('smtp'));
    }
    public function smtpUpdate(Request $request){
        $id=$request['id'];
        // return $request->all();
        $update=Smtp::where('id',$id)->update([
            'mailer'=>$request['mailer'],
            'host'=>$request['host'],
            'port'=>$request['port'],
            'username'=>$request['username'],
            'password'=>$request['password'],
            'encription'=>$request['encription'],
            'from_email'=>$request['from_email'],
            'editor'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
        ]);

        if($update){
            Session::flash('success','SMTP Setting has updated!');
            return redirect()->back();
        }
    }

    // payment gate ways banglas
    
}
