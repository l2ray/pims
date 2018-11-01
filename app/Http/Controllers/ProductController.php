<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Store;
use App\ProductCategory;
use App\ProductType;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pList = Product::all();
        $data = array('pList'=>$pList);
        return view('Products/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $sList = Store::pluck('name', 'id'); //
        $storeList = ProductCategory::pluck('catName','id');
        $pTypeList = ProductType::pluck('tName','id');

        $data = array('sList'=>$sList,'storeList'=>$storeList,'pTypeList'=>$pTypeList);

        return view('Products/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request ->pMDate > $request->pExpDate){
           return redirect()->back()->withErrors(['Sorry Manufacturing Date of a product Cannot be more than the expiry Date.'])->withInput();
       }
       else if(($request->wTreshHold > $request -> pQuantity) ||  ($request -> tHold > $request -> pQuantity)){
            return redirect()->back()->withErrors(['Sorry Nither Reorder Level Nor Treshhold can be greater than the Product\'s Quantity'])->withInput();
       }
       else if($request->wTreshHold < $request -> tHold){
           return redirect()->back()->withErrors(['Sorry Reorder Level Cannot be less than the treshold Level.'])->withInput();
       }
       else if($request -> pUPrice <= 0){
           return redirect()->back()->withErrors(['Sorry The Unit price of a product has to be grather than ZERO'])->withInput();
       }
        $product = new Product;
        
        $product -> pName = $request->pName;
        $product -> pMDate = $request->pMDate;
        $product -> pExpDate = $request-> pExpDate;
        $product->  pType = $request-> pType;
        $product -> pCat = $request-> catName;
        $product -> pUnitPrice = $request -> pUPrice;
        $product -> pWareHouse = $request -> pStore;
        $product -> pQuantity = $request -> pQuantity;
        $product -> treshHold = $request -> tHold;
        $product -> isTax = $request -> isTax;
        $product -> warningTresh= $request -> wTreshHold;
        $product -> pGName = $request -> pGName;
        //$product -> save();withErrors(['msg', 'The Message']);
        //return redirect()->back()->withErrors(['The Message'])->withInput();
        return redirect("/products");
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
        $p = Product::find($id);
        
        $data = array("p"=>$p);
        return view('Products/view',$data);
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
        return view('Products/edit');
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
