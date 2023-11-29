@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')

   <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title" style="color: #fff;">Solar Calculator</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{route('front')}}">{{__('Home')}}</a></li>
                    <li class="page-item">Solar Calculator</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

 


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRcegjt6E0Gie8ud7W3rsRgg3mBlGPqso&libraries=places&callback=initialize"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script type="text/javascript">
        function yearly_usage_calculate(){
            var monthly_electric_bill = parseInt($('#monthly_electric_bill').val());
            var electric_rate = parseInt($('#electric_rate').val());
            var yearly_use =   monthly_electric_bill/(electric_rate/100)*12; //alert(yearly_use);
            $('#yearly_usage').val(yearly_use.toFixed(2));
            //solar panel
            var solar_panel = parseInt(yearly_use) /  parseInt($('#zone_rate').val())/1000 * (parseInt($('#estimate_energy_offset').val())/100);
            $('#solar_panel').val(solar_panel.toFixed(2));
            //average daily usege
            var averge_daily_usege = yearly_use / 365;
            $('#average-daily-usage').val(averge_daily_usege.toFixed(2));
            //Average Daily Solar Production
            var average_daily_production = averge_daily_usege * ( $('#estimate_energy_offset').val() / 100 );
            $('#average-daily-production').val(average_daily_production.toFixed(2)) ;
            //Recomended Batteries
            var recom_batteries = solar_panel / 8;
            $('#recomended-batteries').val(Math.round(recom_batteries));
            //Backup Storage at 100% charge
            var backup_storage_charge = Math.round(recom_batteries) * 20;
            $('#backup-storage').val(backup_storage_charge);
            //Batteries Run-Time without Recharge
            var batteries_run_time = backup_storage_charge / averge_daily_usege * 24;
            $('#batteries-without-recharge').val(batteries_run_time.toFixed(2));
            var total_cost = solar_panel * 1.4 * 1000;
            $('#total_price').text(total_cost);
    
            
}
function show_hide(){
    if($('#solar_panel_dropdown').val()==1){
        $('#elite').show();
        $('#premium').hide();
    }
    else{
        $('#elite').hide();
        $('#premium').show();
    }
}


function show_hide_without_battary(i){
    //battry_type without_battary
    if(i==1){
        $('#without_battary').show();
        $('#with_battary').hide();
    }

    if(i==0){
        $('#without_battary').hide();
        $('#with_battary').show();
    }

}






</script>
<div class="container-fluid">
    <h2 align="center">One Stop shop: Solar whole home with battery Backup Solutions</h2>
    
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Select your Roof Type</label>
            <div class="row">
                <div class="col-md-6" style="background: #eee;"><div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                    <label class="form-check-label" for="gridRadios1">
                        Tile Roof (/w)
                    </label>
                </div></div>
                <div class="col-md-6"  style="background: #ead7f6;"><div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                        Flat Roof (/w)
                    </label>
                </div></div>
            </div>
            <div class="row">
                <div class="col-md-6"  style="background: #eee;">
                    <select name="" id="" class="form-control">
                        <option>Shingles</option>
                        <option>Metal</option>
                        <option>Tile</option>
                    </select>
                </div>
                <div class="col-md-6"  style="background: #ead7f6;">
                    <select name="" id="" class="form-control">
                        <option>TPO</option>
                        <option>EPDM</option>
                    </select>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1">Please Enter Address</label>
                    <input  type="text" class="form-control" id="searchTextField" aria-describedby="emailHelp" placeholder="Enter Address" />
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1">Monthly Electric Bill</label>
                    <div class="row">
                        <div class="col-md-2"><input name="monthly_elect_type"  type="radio" value="">Residential</div>
                        <div class="col-md-2"><input type="radio" name="monthly_elect_type"  value="">Commercial</div>
                        <div class="col-md-2"><input type="radio" name="monthly_elect_type"  value="">Industrial</div>
                        <div class="col-md-2"><input type="radio" name="monthly_elect_type"  value="">Transportation</div>
                        <div class="col-md-2"><input type="radio" name="monthly_elect_type"  value="">All Sectors</div>
                        
                    </div>
                    <input type="text" class="form-control" onblur="yearly_usage_calculate()"  id="monthly_electric_bill" value="175" aria-describedby="emailHelp" placeholder="Monthly Electric Bill ($)" />
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1" style="color: red;">Electric Rate (KWh)</label>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" value="14.7" class="form-control" id="electric_rate" aria-describedby="emailHelp" placeholder="Electric Rate" />
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="exampleInputEmail1">Estimated Energy Offset</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="" id="estimate_energy_offset" onchange="yearly_usage_calculate()"  class="form-control">
                                <?php
                                for($i=50;$i<=125;$i++){
                                    echo "<option value=".$i.">".$i.'%'."<option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Yearly Usage ($)</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="" id="yearly_usage" aria-describedby="emailHelp" placeholder="Yearly Usage" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Zone</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" value="1.3" class="form-control" id="zone_rate" aria-describedby="emailHelp" placeholder="Zone" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Solar Panel (kWh)</label>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <input style="float: left; width:85%" type="text" class="form-control" id="solar_panel" aria-describedby="emailHelp" placeholder="Solar Panel in kW" title="" /><button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Solor panel information will show here">Show Detial</button>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Average Daily Usage (kWh)</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="average-daily-usage" aria-describedby="emailHelp" placeholder="Average Daily Usage" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Average Daily Solar Production (kWh)</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="average-daily-production" aria-describedby="emailHelp" placeholder="Average Daily Production kWh" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Recomended Batteries (kWh)</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recomended-batteries" aria-describedby="emailHelp" placeholder="Recomended Batteries" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Backup Storage at 100% charge (kWh)</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="backup-storage" aria-describedby="emailHelp" placeholder="Backup Storage at 100% charge" />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1 red" style="color: red;">Batteries Run-Time without Recharge  </label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="batteries-without-recharge" aria-describedby="emailHelp" placeholder="Batteries Run-Time without Recharge  " />
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Choose solar panel options</label>
                    </div>
                    <div class="col-md-4">
                        <select onchange="show_hide();" id="solar_panel_dropdown" class="form-control">
                            <option>--Select--</option>
                            <option value='1'>Elite</option>
                            <option value='2'>Premium</option>
                            
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="elite" class="form-control">
                            <option value=''>Recom 4000W All Black Bifacial</option>
                            <option value=''>Efficiency (20.48%)</option>
                            <option value=''>Dimensions (1722 x 1134 x 30 mm)</option>
                        </select>
                        <select id="premium" class="form-control">
                            <option value=''>Convalt 400W All Black</option>
                            <option value=''>Efficiency (20.49%)</option>
                            <option value=''>Dimensions (1723 x 1133 x 35 mm)</option>
                        </select>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><input name="battry_type" id="battry_type"  type="radio" onclick="show_hide_without_battary(0)" value="0">With Battery Option</div>
                            <div class="col-md-4"><input type="radio" name="battry_type" id="battry_type" onclick="show_hide_without_battary(1)" value="1">Without Battery Option</div>
                            
                        </div>
                        
                    </div>
                </div><br><br>
                <div id="without_battary">
                    <div  class="row">
                    <div class="col-md-4"><label for="exampleInputEmail1">Choose Inverter</label></div> 
                    <div class="col-md-4">
                    <select class="form-control" id="choose-inverter1">
                        <option value=''>Microinverter for Panel level monitoring</option>
                        <option value=''>Hoymiles</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="choose-inverter2">
                        <option value=''>String inverter for string level monitoring</option>
                        <option value=''>Solis</option>
                        
                    </select></div>
                </div>
            </div> 

            <div id="with_battary"> 

                <div  class="row">
                    <div class="col-md-4"><label for="exampleInputEmail1"> &nbsp;</label></div> 
                    <div class="col-md-4">
                    <select class="form-control" id="choose-inverter1">
                        <option value=''>Add Panel level monitoring</option>
                        <option value=''>Hoymiles</option>
                    </select>
                </div>
                 
                </div>


            </div><br><br>


                <div class="row">
                    <div align="center"><h3 id="total_price">$ <span id="total_price">459.00</span></h3></div>
                </div>
                <div class="row">
                    <input type="button" class="btn btn-primary" value="Gnerate Invoice" />
                </div>
            </div>
        </div>
        
        
    </form>
</div>
<style>
    .container-fluid{width: 900px;}
    lable{font-weight: bold;}
    .red{color: red!important;}
    #elite{display: none;}
    #premium{display: none;}
    #without_battary{display: none;}
    #with_battary{display: none;}
</style>
<script>
    function initialize() {
var input = document.getElementById('searchTextField');
new google.maps.places.Autocomplete(input);
}
google.maps.event.addDomListener(window, 'load', initialize);
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
    <!-- contact us area end here  -->
@endsection
