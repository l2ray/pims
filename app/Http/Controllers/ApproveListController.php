<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApproveList;
use App\Product;
use App\Store;

class ApproveListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aList = ApproveList::all();
        $pRequesting = array();
        $sRequesting = array();
        $pGiving = array();
        $sGiving = array();
        $quantityRequesting = array();
        $status = array();
        $requestingStaff = array();
        $approvingStaff = array();
        $reasonForRequest = array();
        $requestId = array();
        $total = count($aList);
        for($x = 0; $x < $total; $x++){
            $id = $aList[$x]['id'];
            array_push($requestId,$id);
            $prId = $aList[$x]['pRequestingId'];
            $pRequestingName = Product::find($prId)->pName;
            array_push($pRequesting,$pRequestingName);
            $sRId = $aList[$x]['sRequestingId'];
            $storeRequestingName = Store::find($sRId)->name;
            array_push($sRequesting,$storeRequestingName);
            $pGId = $aList[$x]['pGivingId'];
            $productGivingName = Store::find($pGId)->name;
            array_push($pGiving,$productGivingName);
            $sGId = $aList[$x]['sGivingId'];
            $storeGivingName = Store::find($sGId)->name;
            array_push($sGiving,$storeGivingName);
            array_push($quantityRequesting,$aList[$x]['qRequesting']);
            array_push($status,$aList[$x]['status']);
            array_push($requestingStaff,$aList[$x]['requestingStaffId']);
            array_push($approvingStaff,$aList[$x]['approvingStafId']);
            array_push($reasonForRequest,$aList[$x]['requestReason']);
        }
        $data = array('pRequesting' => $pRequesting,'sRequesting'=>$sRequesting,'pGiving'=>$pGiving,'sGiving'=>$sGiving,
        'quantityRequesting'=>$quantityRequesting,'status'=>$status,'requestingStaff'=>$requestingStaff,'approvingStaff'=>$approvingStaff,
        'reasonForRequest'=>$reasonForRequest,'id'=>$requestId);
        // return $sGiving;
        return view("ApproveIt/index",$data);

    }
    public function updateRequest($input){
        $approveIt = ApproveList::find($input);
        $approveIt->status = 1;
        $approveIt->save();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function addToApprove($pRequesting,$sRequesting,$sGiving,$pGiving,$quantityRqstin,$uId,$reasonForRequest){
// /addToAprroveList/$pRequesting/$sRequesting/$pGiving/$sGiving/$quantityRqstin/1/$reasonForRequest
            $addToApproveList = new ApproveList;
             $addToApproveList ->pRequestingId = $pRequesting;
             $addToApproveList ->sRequestingId = $sRequesting;
             $addToApproveList ->sGivingId = $sGiving;
             $addToApproveList ->pGivingId = $pGiving;
             $addToApproveList ->qRequesting = $quantityRqstin;
             $addToApproveList ->requestingStaffId = $uId;
             $addToApproveList ->requestReason = $reasonForRequest;
             $addToApproveList ->status = 0;
             $addToApproveList ->approvingStafId = 0;
             $addToApproveList->save();

    }
}
