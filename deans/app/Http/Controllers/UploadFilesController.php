<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadFilesController extends Controller
{
    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required'
        ]);

        $user = User::find($request['user_id']);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('users_images'), $imageName);

        if (!is_null($user->profile_img)){
            File::delete($user->profile_img);
        }

        $user->profile_img = 'users_images/' . $imageName;
        $user->save();
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);

    }
}
