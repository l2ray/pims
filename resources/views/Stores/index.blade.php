@extends('layout/app')
@section('content')

    <div class="container-fluid">
        <div class="table-responsive tbl">
    <table class="table table-bordered table-hover table-condensed">
           
            @foreach($sList as $store)
            <tr>
                <td>
                    <button onclick="testIt('store{{ $store->id }}')" class="btn btn-primary">View Drugs</button>
                    {{ $store->name }}
                    <a href="/mystore/addProduct/{{ $store->id }}" class="btn btn-primary addPLft">Add Product</a>
                </td>
                {{--  <td>{{ $store -> location }}</td>  --}}

            </tr>
            <tr>
                <td>
                        {{--  ["1,Paracitamol:200:11","2,Aspirins:500:11","2,Paracitamol:100:11","5,Aspirine:200:11","6,Local Harbs:500:25"]  --}}
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover table-condensed hideIt" id="store{{ $store->id }}">
                                        <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Tresh Hold</th>
                                                <th>Request Drug</th>
                                            </tr>
                                            @php
                                                $count = 0;
                                            @endphp
                                    @foreach($pList as $proList)

                                        @php
                                            $tmp = explode(",",$proList);
                                        @endphp
                                        @if ($tmp[0] == $store->id)
                                            
                                            @php
                                                $storeId = $store->id;
                                                $tmp = explode(",",$proList);
                                                $tmp2 = explode(":",$tmp[1]);
                                            @endphp
                                            
                                           @if ($tmp2[1] > $tmp2[2])
                                           <tr class="good">
                                               
                                            <td class="good">{{ $tmp2[0] }}</td>
                                            <td class="good">{{ $tmp2[1] }}</td>
                                            <td class="good">{{ $tmp2[2] }}</td>
                                            <td><a class="btn btn-primary" href="/requestDrug/{{ $tmp2[3] }}/{{ $storeId }}">Please</a></td>
                                        </tr> 
                                            @elseif($tmp2[1] > 0 && $tmp2[1] <= $tmp2[2])
                                            <tr class="better">
                                                <td class="better">{{ $tmp2[0] }}</td>
                                                <td class="better">{{ $tmp2[1] }}</td>
                                                <td class="better">{{ $tmp2[2] }}</td>
                                                <td><a class="btn btn-primary" href="/requestDrug/{{ $tmp2[3] }}/{{ $storeId }}">Please</a></td>
                                            </tr> 
                                           @else
                                           <tr class="bad">
                                            <td class="bad">{{ $tmp2[0] }}</td>
                                            <td class="bad">{{ $tmp2[1] }}</td>
                                            <td class="bad">{{ $tmp2[2] }}</td>
                                            <td><a class="btn btn-primary" href="/requestDrug/{{ $tmp2[3] }}/{{ $storeId }}">Please</a></td>
                                        </tr> 
                                           @endif
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                </td>
            </tr>
            
            @endforeach
        </table>
</div>
    </div>
   
@endsection
 <script src="js/test.js"></script> 