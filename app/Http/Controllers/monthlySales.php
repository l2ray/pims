<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use PDF;


class monthlySales extends Controller
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
        return view("Reports/monthlySales");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $str = "2018-08-14=29;2018-08-10=39;2018-07-10=1000;2018-07-11=600;2018-05-14=500";
        $tmpYear = array();

        $amounts = array();  $beginDate = $request->startMonth;
        $endMonth = $request -> endMonth;
        $test = Sale::where("created_at",">=",$beginDate)->where("created_at","<=",$endMonth)->get();
        $getCreateDate = explode("\"",explode(" ",explode(",",$test[0])[8])[0])[3];

        $test2 = "";
        //        {"id":4,"qSold":1,"unitPrice":26,"totalCost":"26.45","salesPerson":2,"cusId":1,"productId":1,
         //"salesFrom":1,"created_at":"2018-09-14 20:14:58","updated_at":"2018-09-14 20:14:58"},


         //"created_at":"2018-09-14 20:14:58"
        for($x = 0; $x< count($test); $x++){
            $str2 = explode(",",$test[$x]);
            $amount = explode("\"",explode(":",explode(",",$test[$x])[3])[1])[1];//explode(":",$str2[3])[1];
            $yearTmp = substr(explode("\"",explode(" ",explode(",",$test[$x])[8])[0])[3],0,7);
            //array_push($tmpYear,$yearTmp);
            
            $test2 = $yearTmp;
            if(!in_array($test2,$tmpYear)){
                    array_push($tmpYear,$test2);
                    
                    $key = array_search($test2,$tmpYear);
                    $a = $amount;
                    array_push($amounts,$a);
            }
            else{
                 $key = array_search($test2,$tmpYear);
                $a = $amount;
               $amounts[$key] += $a;
            }
        }

/* Twilio Account
Account Sid
    ACaf08abceb65377d4a1a1db1607f460f8

Auth Token
3974a6d7e1d6da7177ed4954df86ba43
*/

      
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
            <table border=\"2\" cellspacing=\"1\">";
            $html .="<tr>
                        <td style=\"text-align:center;font-weight:bold; text-size:15px;\"colspan=\"3\">
                            Thank You for Your purchase Valuable Customer.<br />
                            Please find a summary of your transaction.
                        </td>
                    </tr>";
                    
                
            $html .= '<tr>';
            $html .='
                         <th>Year</th>
                         <th>Month</th>
                         <th>Total Sales</th>';
           $html .='</tr>';
        for($x = 0; $x < count($tmpYear);$x++){
            $dateFormat = explode("-",$tmpYear[$x])[0];//.":".
            $totalSales = $amounts[$x];
             $monthFormat = explode("-",$tmpYear[$x])[1];
            $html.="<tr>
                    <td>$dateFormat</td>
                    <td>$monthFormat</td>
                    <td>$totalSales</td>
            </tr>";
        }
             //$xx = 
             $html.="</table>";
             PDF::SetTitle("res");
            PDF::AddPage();
            PDF::writeHTML($html,true,false,true,false,'');
            PDF::Output("res.pdf");
       // return $sdf;
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