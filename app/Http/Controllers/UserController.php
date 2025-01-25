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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|unique:users,phone_number', 
            'password' => 'required|min:8'       
        ], [
            'email.unique' => 'البريد الإلكتروني مسجل مسبقًا.',
            'phone_number.unique' => 'رقم الهاتف مسجل مسبقًا.',
            'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',    
        ]);
    
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone_number = $request->input('phone_number');
        $users->password = Hash::make($request->input('password')); 
        $users->role = $request->input('role');
    
        $users->save();
    
        return redirect()->route('admin.show')->with('success', 'تمت إضافة المشرف بنجاح.');
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
           $user = User::findOrFail($id);
       
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users,email,'.$id,
               'phone_number' => 'required|string|unique:users,phone_number,'.$id, 
               'password' => 'nullable|min:8' 
           ], [
               'email.unique' => 'البريد الإلكتروني مسجل مسبقًا.',
               'phone_number.unique' => 'رقم الهاتف مسجل مسبقًا.',
               'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.', 
           ]);
       
           $user->name = $request->name;
           $user->email = $request->email;
           $user->phone_number = $request->phone_number;
           
           if ($request->password) {
               $user->password = Hash::make($request->password);
           }
       
           $user->save();
       
           return redirect()->route('admin.show')->with('success', 'تم تحديث معلومات المشرف بنجاح.');
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
