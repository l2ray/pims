<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CustomStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                $product = new Product;
        
        $product -> pName = $request->pName;
        $product -> pMDate =$request->pMDate;
        $product -> pExpDate = $request-> pExpDate;
        $product-> pType = $request-> pType;
        $product -> pCat = $request-> catName;
        $product -> pUnitPrice = $request -> pUPrice;
        $product -> pWareHouse = $request -> id;
        $product -> pQuantity = $request -> pQuantity;
        $product -> treshHold = $request -> tHold;
        $product -> isTax = $request -> isTax;
        $product -> warningTresh= $request -> wTreshHold;
        $product -> save();
       // return redirect("/products");
                return redirect("/stores");
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
