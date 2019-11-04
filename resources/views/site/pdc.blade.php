@extends('light')
@section('content')
		<div class="container" style="margin-top:10%;">
				<style>
        @import url('https://fonts.googleapis.com/css?family=Cutive+Mono');
        @import url('https://fonts.googleapis.com/css?family=Lato');

        input {
            text-transform: uppercase;
        }
        body {
            font-family: "Lato";
        }
        #pdc_preview {
            font-family: "Cutive Mono";
            font-weight: bold;
        }
        </style>
        <p class="text-justify">VATSIM data last updated on:</p> <div id="last_update" style="display:inline;"></div>
        <div>
            <button type="submit" class="btn btn-primary" onclick="get_data()">Refresh VATSIM data</button>
        </div>
        
        <div style="margin-top: 20px; line-height: 30px;">
            Callsign: <input type="text" id="callsign"><br>
            No SID:   <input type="checkbox" id="no_sid_check"><br>
            Top Alt:  <input type="text" id="top_alt"> <input type="checkbox" id="top_alt_check"><br>
            Dep Freq: <input type="text" id="dep_freq"><br>
            Beacon:   <input type="text" id="beacon"><br>
            Gnd Freq: <input type="text" id="gnd_freq"><br>
            <button onclick="generate_pdc()">Generate PDC</button>
        </div>
    
        <div id="pdc_preview" style="margin-top:30px;width: 500px;"></div>
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="/assets/js/vatsim_data.js"></script> 
    <script src="/assets/js/pdc.js"></script> 
</div>
@endsection