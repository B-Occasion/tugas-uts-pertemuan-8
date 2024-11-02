<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\String_;

class UserController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return redirect()->route('login')
            ->withErrors(['email'=>'please login to access the dashboard.',
            ])->onlyInput('email');
        }
        $users = User::get();
        return view('user.index')->with('userss', $users);
    }

    public function destroy(String $id){
        $user = User::find($id);
        $file = public_path() . '/storage/' . $user->photo;
        try{
            if(File::exists($file))
            {
                File::delete($file);
                $user->delete();
            }
        } catch (\Throwable $th) {
            return redirect('user.index')->with('error', 'Gagal hapus data');
        }
        return redirect('user.index')->with('success', 'Data dihapus');
    }

    public function edit(String $id){
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // kalo upload foto baru, hapus fotonya
            if ($user->photo) {
                $oldPhotoPath = public_path('storage/' . $user->photo);
                if (File::exists($oldPhotoPath)) {
                    File::delete($oldPhotoPath);
                }
            }
            // simpan foto baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath; // Save the new photo path
        }

        $user->save();
        return redirect()->route('users.index');
    }
}
