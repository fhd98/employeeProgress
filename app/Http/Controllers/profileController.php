<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\loginModel;

/**
 * Description of profileController
 *
 * @author hp
 */
class profileController extends Controller {
    //put your code here
    public function editProfile() {

        if (session()->has('user')) {
            //validation error
            
           //$error = session()->get('error'); 
           $data['posted'] = session()->get('posted'); 
           $data['error'] = '';
           $data['error'] = session()->get('error');
            
            
            $adminID=(session('adminID'));           
            
            
            $data['adminInfo']= loginModel::where('adminID', $adminID)->first();
            
            return view('addProfile', $data );
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    }
    
        public function profilePostAction(Request $request){
        
        $adminID=(session('adminID'));
        
        $POST = request()->post();
        $validator = validator()->make($POST, [
            'experience' => 'required|gt:0',
            'dob' => 'required|date|before:"2000-01-01" ',
            'picture' => 'image',
            'picture' =>'mimes:jpg,bmp,png'
                ],
                [
                    'experience.gt' => 'Experience must be greater than 0',]
        );

        if ($validator->fails()) {
            return redirect('/profile-edit')->with([
                        'posted' => $POST,
                        'error' => $validator->errors()->first()
            ]);
        }
        else {        
        
        
          //dd($request);  
        
        //image
        
        if ($request->hasFile('picture')){            
       
        $path= public_path("adminProfilePictures");
        
        $imageName= $adminID.'_admin_prof_image.'.$request->picture->extension();
        $request->picture->move($path, $imageName);
        loginModel::where('adminID',$adminID)->update(['picture'=>$imageName, 
            'name'=>$request['admin_name'], 
            'dob'=>$request['dob'], 
            'experience'=>$request['experience'], 
            'expertise'=>$request['expertise']]);
        
        return redirect('profile-view');
            
           // return "HElloo";
    }
        loginModel::where('adminID',$adminID)->update(['name'=>$request['admin_name'], 
            'dob'=>$request['dob'], 
            'experience'=>$request['experience'], 
            'expertise'=>$request['expertise']] );                                                             
                                                                       
        
        return redirect('profile-view');
    
    
    }
    
    
}

public function viewProfile() {
    
    if (session()->has('user')) {
                       
            
            $adminID=(session('adminID'));
            $data['adminInfo']= loginModel::where('adminID', $adminID)->first();
            
            return view('profileView', $data );
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    
}
}



