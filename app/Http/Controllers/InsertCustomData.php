<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temp;
use App\ProductCategory;
use App\ProductType;
use App\Store;
use App\Product;
class InsertCustomData extends Controller
{
    
    //University of British Colombia
    public function saveTmp($input){
        $arr = explode(",",$input);
        $tmpProduct = new Temp;
        $tmpProduct->ProductName = $arr[0];
        $tmpProduct->pQuantity = $arr[1];
        $tmpProduct->pPrice = $arr[2];
        $tmpProduct->pId = $arr[3];
        $tmpProduct->vatCharged = $arr[4];

        $tmpProduct->save();
        return "";
    }
    public function index(){ 
        $html = '<h1>Hello World</h1>';
        $html .="<b>This is greate</b>";
        
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('hello_world.pdf');
    
    }
    public function deleteItem($input){
        $delete = Temp::where('pId',$input);
        $delete->delete();
        return '';
    }
    public function addPToStore($input){
         $storeList = ProductCategory::pluck('catName','id');
        $pTypeList = ProductType::pluck('tName','id');
        $storeName = Store::find($input)->name;
        $data = array('storeList'=>$storeList,'pTypeList'=>$pTypeList,'id'=>$input,'storeName'=>$storeName);

        return view("Stores/addProductToMyStore",$data);

    }

    public function drugRequest($pId, $storeId){
        //$data = array('sId'=>$storeId,'pId'=>$pId);
        $slist= Store::where('id', '!=' , $storeId)->pluck('name','id');
        $pListToSubFrom = Product::where('id','!=',$pId)->pluck('pName','id');
        $productName = Product::find($pId)->pName;
        $sName = Store::find($storeId)->name;
        $data = array('sList'=>$slist,'sId'=>$storeId,'pId'=>$pId,'productName'=>$productName,'sRequestingName'=>$sName); 
        //$slist = Store::pluck('name','id');

        //return $pListToSubFrom;

        return view('Stores/requestDrug',$data);
    }

}
