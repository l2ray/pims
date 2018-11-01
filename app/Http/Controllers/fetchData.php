<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Store;

class fetchData extends Controller
{
    //
    public function getData($input){
           //$test = Input::get('pID');
    $pPrice = Product::find($input);
   // return response()->json(...);
    return \Response::json($pPrice);
      //  return ("<h1>$input</h1>");
    }
    public function getVat($proInput){
      $vat = Product::where('id',$proInput)->get()[0];
      return \Response::json($vat);
    }
    public function getDrugList(){
      $dList = Product::all();
      return \Response::json($dList);
    }
    public function makeQuery($pId, $sId){
      $pInQ = Product::find($pId);
      $products = Product::where('pWareHouse',$sId)->get();
      $size = count($products);
      $array = array("products"=> $products,"pInQ"=>$pInQ,'size'=>$size);
      return \Response::json($array);
    }
}
