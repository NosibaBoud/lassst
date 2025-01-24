<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('superadmin.manageadmins', compact('users'));;
    }
    public function create(){
        return view('superadmin.addadmin');
    }
    public function store(Request $request){
       $users=new User ;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->phone_number = $request->input('phone_number');
            $users->password = $request->input('password');
            $users->role=$request->input('role');
        $users->save();
        return redirect()->route('admin.show');
    }
       // Show the edit form
       public function edit($id)
       {
           $user = User::find($id);
           return view('superadmin.editadmin', compact('user'));
       }
   
       // Handle the update logic
       public function update(Request $request, $id)
       {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Unique email validation
            'phone_number' => 'required|string|unique:users,phone_number', // Unique phone number validation
        ]);
   // Update user information
           $user = User::find($id);
           $user->name = $request->name;
           $user->email = $request->email;
           $user->phone_number = $request->phone_number;
           $user->password = $request->password;
   
           $user->save();
   
           return redirect()->route('admin.show', $id)->with('success', 'User information updated successfully.');
       }
    public function delete($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'admin deleted successfully!');
        }
    }
    public function logout(){
    Auth::logout(); // Log the user out
    return redirect('/login');}
}
