<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Hash;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('email');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $data=$request->all();
        if($validatedData){
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->name);
        $user->email_token=base64_encode($request->email);
        $user->email_verify=0;
        $user->save();

        $data=[
            'email'=>$user->email,
            'email_token'=>$user->email_token

        ];
            dispatch(new SendEmailJob($data));
            return redirect()->back()->with('success','Account created successfully. Check your inbox and click on link to verify your account.');
        }

    }

    public function verify($token)
    {
        try{
            $user = User::where('email_token',$token)->first();
            $user->email_verify = '1';
            $user->save();
            if($user->email_verify==1){
                return redirect('/email')->with('success','Your account has been verified successfully. Please login with your credentials.');
            }else{
                
                return redirect('/email')->with('error','You aren\'t verified.');
            }
            

        }catch(Execeptio $e){
            \Session::flash('flash_error','Something went wrong...');
            return redirect('/email')->with('error','You aren\'t verified.');
        }
    }

    }

?>