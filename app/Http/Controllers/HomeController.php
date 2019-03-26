<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use app\Avatar;


class HomeController extends Controller
{
    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.home');
    }

    public function updateProfile(Request $request)
    {
        // Form validation
        $request->validate([
            'email'              =>  'required',
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        //a voir
        //$user->name = $request->input('name');
        
        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = 'image'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            //$user->picture = $filePath;
            //Ici on crée un nouvel avatar et on le met à jour
            $avatar = new Avatar;
            $avatar->users_id = '3';
            $avatar->email = $request('email');
            $avatar->picture = $filePath;
        }
        // Persist user record to database
        $avatar->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Avatar mis à jour avec succès!']);
    }

}
