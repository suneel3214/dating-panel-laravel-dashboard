<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(){
        $data = UserProfile::orderBy('id', 'desc')->paginate(10);
        return view('backend.Admin.ProfileComponent.index',compact('data'));
    }

    public function show($id){

         $user = UserProfile::find($id);
  
        return response()->json($user);
        
    }

    public function destroy($id){
        $user = UserProfile::find($id)->delete($id);

        return response()->json([

            'success' => Alert::success('Deleted','User Profile Deleted SuccessFully')
        ]);
    }
}
