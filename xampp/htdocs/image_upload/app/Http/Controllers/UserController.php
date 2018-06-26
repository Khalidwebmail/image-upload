<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function uploadFile()
    {
        return view('uploadfile');
    }

    public function UploadFilePost(Request $request)
    {
    	$request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
        if ($request->hasFile('fileToUpload')) {
            $imageName = $request->fileToUpload->store('logos');
        }

        $user = new User();
        $user->image = $imageName;
        $user->save();
        //$request->fileToUpload->store('logos');
        return back()->with('success','You have successfully upload image.');
    }
}
