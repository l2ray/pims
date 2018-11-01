<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Branch;
class LoginInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("Logins/welcome");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function adduser(){
        $bList = Branch::pluck('branchName', 'id');
        $data = array('bList'=>$bList);
        return view("Logins/addUser",$data);
    }
    public function storeUser(Request $request){
        $password        = $request->pass;
        $confirmPassword = $request->conPass;
        $fullName        = $request->name;
        $userName        = $request->uName;
        $address         = $request->address;
        $pno             = $request->pNo;
        $bNo             = $request->bNum;
        
        if($password != $confirmPassword){
            return redirect()->back()->withErrors(['Sorry Password and confirm Password are not equal'])->withInput();
        }
        $login = new Login;
        $login -> uName    = $userName;
        $login -> password = $password;
        $login -> branchId = $bNo;
        $login -> pNo      = $pno;
        $login -> address  = $address;
        $login -> name     = $fullName;
        $login -> save();
        
        return redirect("/");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $len = 0;
        $userName = $request->userName;
        $password = $request->pwrd;
        $curUser = Login::where("uName",$userName)->where("password",$password)->get();
        // where("created_at",">=",$beginDate)->where("created_at","<=",$endMonth)->get();
        $len = count($curUser);
        if($len == 0){
            return redirect()->back()->withErrors(["Sorry One of your credentials is not correct.\n
                    Either the password or both.
                    Please check and try again. Thank You."])->withInput();
        }
        $request->session()->put('test','lot');   //Session::put('test',"lot");
        return view("Dashboard/index");//"$userName $password This is the Store function of the logins";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}