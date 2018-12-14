<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registrationmodel;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::select('select * from DEMOTABLE');

        return view('child', ['users' => $users]);
    }

    public function insertdata(Request $request){

        //dd($request);
        if ($request->input("pwd") == $request->input("cpwd")) {
            $userdata = new Registrationmodel();
            $userdata->User_name = $request->input("username");
            $userdata->Gender = $request->input("gender");
            $userdata->Hobbies = "";
            foreach ($request->input("cb") as $key => $value) {
                $userdata->Hobbies .= $value." ";
            }
            $userdata->Color = $request->input("color");
            $userdata->User_email = $request->input("email");
            $userdata->User_password = $request->input("pwd");
            $userdata->User_confirm_password = $request->input("cpwd");
            $userdata->save();
            echo "<script type='text/javascript'>alert('Successfully registered.');</script>";
            return view('child');
        }
        else{
            echo "<script type='text/javascript'>alert('password not matched');</script>";    
            return view('child');
        }

    }

    public function getdata(Request $request){

        //dd($request);
        $useremail1 = $request->input("loginemail");
        $password1 = $request->input("loginpwd");
        $userdata = Registrationmodel::where('User_email',$useremail1)->get();
        
        if ( !count($userdata) ) {
            echo "<script type='text/javascript'>alert('Invalid email id');</script>";
            return view('child');
            //return redirect('/')->with('messgae', 'Welcome to ExpertPHP Tutorials!');
        }
        else{
            if($userdata[0]->User_password == $password1){
                echo "<script type='text/javascript'>alert('Successfully loged in');</script>";
                $result['data'] = $userdata[0];
                //return redirect()->back();       
            }
            else{
                echo "<script type='text/javascript'>alert('Invalid password');</script>";
                return view('child');
                //return redirect()->back();
            }
        }
        return view('child')->with('details',$result);
    }

    public function updatedata(Request $request){

        $uid = $request->input("uid");
        $name = $request->input("updatename");
        $password = $request->input("updatepassword");


        $updatedata = Registrationmodel::where('id',$uid)->first();
        $updatedata->User_name = $name;
        $updatedata->User_password = $password;
        $updatedata->save();

        return view('child');
    }
}

?>