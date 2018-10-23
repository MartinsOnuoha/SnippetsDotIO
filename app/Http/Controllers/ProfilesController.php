<?php

namespace App\Http\Controllers;

use App\User;
use App\Snippet;
use Session;
use Illuminate\Http\Request;
use Auth;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('profiles.profile')->with('user', $user);
        
    }

    public function edit()
    {
        return view('profiles.edit')->with('user', Auth::user());
    }

    public function update(Request $r)
    {
        // $this->validate($r, [
        //     'location' => ['required'],
        //     'about' => ['required'],
        //     'phone' => ['required']
        // ]);
        
        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about,
            'phone' => $r->phone,
            'industry' => $r->industry,
            'website' => $r->website,
            'talent' => $r->talent
        ]);

        if($r->hasFile('avatar')) {
           /* $user = User::where('id', Auth::user()->id)->first()
                        ->update(['avatar' => $r->avatar->store('public/avatars')]);*/
            Auth::user()->update([
                'avatar' => $r->avatar->store('public/avatars'),
            ]);
        }

        Session::flash('success', 'Profile updated.');

        return redirect()->back();
    }

    public function addSnippet(Request $req)
    {   
        
            $image = $req->file('snippetfile');
            $video_types = array("mp4", "mov", "ogg");
            $image_types = array("jpg", "gif", "png", "bmp");
            $snippetfilename = time() . '.' . $image->getClientOriginalExtension();
            if(in_array($image->getClientOriginalExtension(), $image_types)) {
                $filetype = "image";
            }elseif (in_array($image->getClientOriginalExtension(), $video_types)) {
                $filetype = "video";
            }
            $destination = 'snippetuploads/';
            $image->move($destination, $snippetfilename);


            $filedatabase = $destination . '' . $snippetfilename;

        $snippeter = Snippet::create([
            'snippetdetails' => $req->snippetdetails,
            'snippetags' => $req->snippetags,
            'snippetfile' => $filedatabase,
            'user_name' => Auth::user()->name,
            'user_slug' => Auth::user()->slug,
            'file_type' => $filetype,
            'file_extension' => $image->getClientOriginalExtension(),
            'user_id' => Auth::user()->id
        ]);

        if($snippeter) {
            return redirect()->back();
            return response()->json($snippeter, 200);
        }
        return response()->json('Failed', 501);
    }
    public function snippetEdit($snippetid)
    {
        $snippet = Snippet::where('id', $snippetid)->first();
        if ($snippet->user_id != Auth::user()->id) {
           return redirect()->back();
        }
        
        return view('snippet.edit')->with('snippet', $snippet);
    }
    public function snippetUpdate(Request $r)
    {
        $this->validate($r, [
            'snippetags' => ['required'],
            'snippetdetails' => ['required'],
        ]);
        Snippet::where('id', $r->snippetid)
                        ->where('user_id', Auth::user()->id)
                        ->update([
                            'snippetags' => $r->snippetags,
                            'snippetdetails' => $r->snippetdetails,
                        ]);

        Session::flash('success', 'Snippet updated.');

        return view('home');
    }
    public function deleteSnippet($snippet_id)
    {
        
        Snippet::where('id', $snippet_id)
                        ->where('user_id', Auth::user()->id)
                        ->delete();
        
        return redirect()->back();
        return response()->json('Snippet Deleted', 200);
    }

}
