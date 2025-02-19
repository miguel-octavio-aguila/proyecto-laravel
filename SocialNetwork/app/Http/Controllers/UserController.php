<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// to can use get for the images
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        // Get user authenticated
        $user = Auth::user();

        // Validate form
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        // Get form data
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Assign new values to the user object
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Upload image
        $avatar = $request->file('avatar');
        if ($avatar) {
            // Generate a unique name
            $avatar_name = time() . $avatar->getClientOriginalName();

            // Save image in storage (storage/app/users)
            Storage::disk('users')->put($avatar_name, File::get($avatar));

            // Set image name in user object
            $user->image = $avatar_name;
        }

        // Update user in database
        $user->update();

        return redirect()->route('config')->with(['message' => 'User updated successfully']);
    }

    public function getImage($filename)
    {
        // Obtain the image from the disk
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function index($search = null)
    {
        if (!empty($search)) {
            $users = User::where('nick', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('surname', 'LIKE', '%' . $search . '%')
                ->orderby('id', 'desc')
                ->paginate(5);
        } else {
            $users = User::orderby('id', 'desc')->paginate(5);
        }

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function profile($id)
    {
        $user = User::with(['images' => function ($query) {
            $query->orderBy('created_at', 'desc'); // Ordenar por fecha de creación descendente
        }])->find($id);
        return view('user.profile', [
            'user' => $user
        ]);
    }
    
}
