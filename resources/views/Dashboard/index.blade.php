@extends('layout/app')
@section('content')
    <div id="productPic"></div>
    {{ Session::get('test') }}
@endsection
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/highcharts.js') }}"></script>
<script>
        $(document).ready(function(){
            $.get("/getDrugList",function(dat){
               var pQty = [];
               for(var x = 0; x<dat.length; x++){
                   var actQ = parseInt(dat[x].pQuantity);
                   var obj = {name:dat[x].pName,data:[actQ]};
                    pQty.push(obj);
                }
                Highcharts.chart('productPic', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Product Summary'
  },
  subtitle: {
    text: 'Count Per Product'
  },
  xAxis: {
    categories: [
      'Drug'

    ],
    crosshair: false, title: {
      text: 'Product Name '
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Quantity Number'
    }
  },
 
  series:pQty 
});
            });

        });
</script>