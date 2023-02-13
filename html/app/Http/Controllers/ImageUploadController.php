<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class ImageUploadController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $path = Storage::disk('s3')->put('avatars', $request->image);
        $path = Storage::disk('s3')->url($path);
  
        /* Store $imageName name in DATABASE from HERE */
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image', $path); 
    }
} 
?>