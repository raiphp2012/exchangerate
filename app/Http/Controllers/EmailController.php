<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;
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
            'title' => 'required|max:255',
            'body' => 'required',
            'email'=> 'required',
        ]);

        $data=$request->all();
        /*echo "<pre>";print_r($data); die;*/
        
        if($validatedData){
            $details=[
                "email"=>$request->email,
                "title"=>$request->title,
                "body"=>$request->body
            ];
            dispatch(new SendEmailJob($details));
            return redirect()->back();
        }

    }

    }

?>