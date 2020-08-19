<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $Profiles = new Profile;
        $form = $request->all();
        
       
        unset($form['_token']);
        
        $Profiles ->fill($form);
        $Profiles ->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
        $Profiles = Profile::find($request->id);
        if (empty($Profiles)) {
            abort(404);
        }
        return view('admin.profile.edit');
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $Profiles = Profile::find($request->id);
        $Profiles_form = $request->all();
        unset($Profiles_form['_token']);
        
        $Profiles->fill($Profiles_form)->save();
        
        $profilelog = new Profilelog;
        $profilelog->profile_id = $Profiles->id;
        $profilelog->edited_id =Carbon::now();
        $profilelog->save();
        
        return redirect('admin/profile');
    }
    public function index(Request $request)
    {
        
    }
}
