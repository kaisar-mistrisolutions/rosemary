<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.users.index');
        $users = User::all();
        return view('layouts.backend.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.users.create');

        $roles = Role::getForSelect();
        return view('layouts.backend.users.form', [
            'roles'=> $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.users.create');

        Validator::make($request->all(),[
            'name'=>'required|string',
            'phone_number'=>'required|max:11',
            'email'=>'required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
         ]);

        $image=$request->file('image');

         if (isset($image)){
            $imgName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
         }
        $user = User::create([
            'name' => $request->name,
            'role_id' => $request->role,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'status' => $request->filled('status'),
            'image'=>$request->file('image')->storeAs('users',$imgName)
        ]);
        return redirect()->route('app.users.index')->with('success','User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('layouts.backend.users.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('app.users.edit');
        
        $roles = Role::all();
        return view('layouts.backend.users.form', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('app.users.edit');
        
        $image=$request->file('image');

        if (isset($image)){
            $imgName=Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

            if (Storage::disk('public')->exists($user->image)){
                Storage::disk('public')->delete($user->image);
            }

            $user->update([
                'name' => $request->name,
                'role_id' => $request->role,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'address' => $request->address,
                'status' => $request->filled('status'),
                'image'=>$request->file('image')->storeAs('users',$imgName)
            ]);
        }
        else{
            $user->update([
                'name' => $request->name,
                'role_id' => $request->role,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
                'address' => $request->address,
                'status' => $request->filled('status'),
                'image'=>$user->image
            ]);
        }
        
        return redirect()->route('app.users.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('app.users.destroy');

        if (Storage::disk('public')->exists($user->image)){
                Storage::disk('public')->delete($user->image);
            }

        $user->delete();

        return back()->with("success", "User Successfully Deleted");
    }
}
