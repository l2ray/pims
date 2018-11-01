<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Temp;
use App\Sale;
use PDF;
use App\ReceiptGen;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Sales/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $delete = Temp::all();
        $tmpIds = array();
        foreach($delete as $del){
            array_push($tmpIds,$del->id);
        }
        for($x = 0; $x <count($tmpIds); $x++){
            $tmp = Temp::find($tmpIds[$x]);
            $tmp->delete();
        }

        $products = Product::pluck('pName','id');
        $pGList = Product::pluck('pGName','id');
        $data = array('pList'=>$products,'pGList'=>$pGList);

        return view('Sales/create',$data);
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
	    $today = date("Y-m-d H:i:s");
	    $currReceiptNo = ReceiptGen::find(1);
	    $tNo = $currReceiptNo->ReceiptNo;
	    $sd = explode("S",$tNo)[1];
	    //	echo "$sd[1]";
	    //
	    //	$y = -1;
	    //for($x = 0; $x <strlen($sd); $x++){
	    //		if($sd[$x+1] !=0){
	    //				$y = $x;
	    //						break;
	    //							}
	    //								
	    //								}
	    								//echo "$sd[$y]";
			$res = 0;

			$test = $sd+1;
			$len = strlen($test);
			if($len == 1 ){
			$res = "PIMS0000".$test;
			//echo "<h1>$res</h1>";
			}
			else if($len == 2){
			$res = "PIMS000".$test;
			//echo "<h1>$res</h1>";
			}
			else if($len == 3){
			$res = "PIMS00".$test;
//			echo "<h1>$res</h1>";
			}
			else if($len == 4){
	    		$res = "PIMS0".$test;
//	    		echo "<h1>$res</h1>";
			}
		        else{
			$res = "PIMS".$test;
			}	

			$currReceiptNo->ReceiptNo = $res;
			$currReceiptNo->save();
            $html = "
            
            <style>
                table{
                    border-color:blue;
                }
                
                th{
                    border-color:blue;
                    font-weight:bold;
                    text-align:center;
                }
                .total{
                    text-align:right;
                    color:red;
                }
                .spanIt{
                    text-align:right;
                }

                }
            </style>
            <table border=\"1\" cellspacing=\"0\">";
            $html .="<tr>
                        <td style=\"text-align:center;font-weight:bold; text-size:15px;\"colspan=\"4\">
                            Thank You for Your purchase Valuable Customer.<br />
                            Please find a summary of your transaction.
                        </td>
                    </tr>";
                    $html.="<tr>
                        <td colspan=\"4\"><b>Transaction Details</b><br/>
                        <b>Operator:</b> admin<br/>
                        <b>Date:</b>$today<br/>
                        <b>Branch:</b>Lameng
                        
                        </td>
                    </tr>";
                
            $html .= '<tr>';
            $html .='<th>Item Name</th>
                         <th>Qty</th>
                         <th>Unit Price</th>
                         <th>Total</th>';
           $html .='</tr>';
            
        $tmpSale = Temp::all();
       
        $cId = 1;// to be updated later;
        $sper = 2; // to be updated later;
        $sales4Rm = 1; // To be updated later
        $vatCharged = 0;
        $totalNoVat = 0;
        $totalWitVat = 0;
        for($x = 0; $x < count($tmpSale); $x++){
            $sales = new Sale;
            $vatCharged = $vatCharged+$tmpSale[$x]['vatCharged'];
            $totalNoVat = $totalNoVat + $tmpSale[$x]['pPrice'];
            $pQuantity = $tmpSale[$x]['pQuantity'];
            $pName = $tmpSale[$x]['ProductName'];
            
            $total =  $tmpSale[$x]['pPrice'];
            $pId = $tmpSale[$x]['pId'];
            $pUPrice = Product::find($pId)->pUnitPrice;
            $sales->qSold = $pQuantity ;
            $sales->unitPrice= $pUPrice;
            $sales->totalCost = $total ;
            $sales->productId =  $pId;
            $sales->salesFrom = $sales4Rm ;
            $sales->cusId = $cId ;
            $sales->salesPerson = $sper ;

           // $sales->save();
           $html .= '<tr>';
            $html .="<td>&nbsp;&nbsp;$pName</td>
                     <td>&nbsp;&nbsp;$pQuantity</td>
                     <td>&nbsp;&nbsp;$pUPrice</td>
                     <td style=\"border-color:blue;\" class=\"total\">$total&nbsp;&nbsp;</td>";
           $html .='</tr>'; 
        }
        $html .="<tr>

        <td colspan=\"3\" class=\"spanIt\">Vat Charged&nbsp;&nbsp;</td>
        <td class=\"spanIt\">$vatCharged&nbsp;&nbsp;</td></tr>";
        $html .="<tr><td colspan=\"3\" class=\"spanIt\">Sub Total&nbsp;&nbsp;</td><td class=\"spanIt\">$totalNoVat&nbsp;&nbsp;</td></tr>";
        $totalWitVat = $totalNoVat+$vatCharged;
        $html .="<tr><td colspan=\"3\" class=\"spanIt\">Total&nbsp;&nbsp;</td><td class=\"spanIt\">$totalWitVat&nbsp;&nbsp;</td></tr>";
        $data = array('salesProduct'=>$tmpSale);

           
                
            

        $html .= '</table>';
        PDF::SetTitle("$res");
        PDF::AddPage();
        PDF::writeHTML($html,true,false,true,false,'');
        PDF::Output("$res.pdf");
        //return view("Sales.generateReceipt",$data);

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
        return view('Sales/view');
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
        return view('Sales/edit');
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
