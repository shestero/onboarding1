<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarUpload(Request $request)
    {
        $request->validate([
            //'userid' => 'required|integer'
        ]);

        $userid = Auth::user()->id; // $request->userid;

        return view('imageUpload')->with('userid', $userid);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function avatarUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        $userid = Auth::user()->id; // $request->userid;

        if (! $request->hasFile('image')) {
            return back()->with('error', 'No image');
        }

        $imageName = $userid.'.'.$request->image->extension();

        $res = Storage::disk('s3')->put($imageName, $request->image->get());
        if (! $res) {
            return back()->with('error', 'No image');
        }

        $path = Storage::disk('s3')->url("avatars/$imageName");

        DB::table('users')
                ->where('id', $userid)
                ->update(['avatar' => $imageName]);

        return back()
            ->with('success', "You have successfully upload image $imageName.")
            ->with('image', $path);
    }
}
