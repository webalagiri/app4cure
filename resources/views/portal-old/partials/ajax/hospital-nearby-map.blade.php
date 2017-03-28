<?php /* ?>
{{$hospitalAddress[0]->hospital_name}}
{{$hospitalAddress[0]->address}}
{{$hospitalAddress[0]->city}}
{{$hospitalAddress[0]->state}}
{{$hospitalAddress[0]->country}}
<?php */ ?>
@if(!empty($hospitalAddress[0]))
    <style>

        ul.nearbylist {
            list-style-type: none;
            width: 600px;
        }

        ul.nearbylist h3 {
            font: bold 10px/1.5 Helvetica, Verdana, sans-serif;
            width:400px;
            overflow:hidden;
        }

        ul.nearbylist li img {
            float: left;
            margin: 0 15px 0 0;
        }

        ul.nearbylist li p {
            font: 200 12px/1.5 Georgia, Times New Roman, serif;
        }

        ul.nearbylist li {
            padding: 10px;
            overflow: auto;
        }

        ul.nearbylist li:hover {
            background: #eee;
            cursor: pointer;
        }
    </style>
    <?php
    $map_address=urlencode($hospitalAddress[0]->hospital_name.','.$hospitalAddress[0]->address);
    //echo $map_address;
    ?>
    <script type="text/javascript">
        function change_iframe_url(type)
        {
            document.getElementById('iframemap').src = "<?php echo url(); ?>/api/nearby-map.php?map_address={{$map_address}}&map_type="+type;
            document.getElementById('iframeinnermap').src = "<?php echo url(); ?>/api/nearby-place-map.php?map_address={{$map_address}}&&map_type="+type;
        }
    </script>

    <ul class="nearby">
        <li><a href="javascript:void(0);" onclick="change_iframe_url('restaurant')"><i class="icon-home2"></i> Restaurants</a></li>
        <li><a href="javascript:void(0);" onclick="change_iframe_url('lodging')"><i class="icon-home2"></i> Accomodation</a></li>
        <li><a href="javascript:void(0);" onclick="change_iframe_url('atm')"><i class="icon-home2"></i> ATM</a></li>
        <li><a href="javascript:void(0);" onclick="change_iframe_url('park')"><i class="icon-home2"></i> Local Park</a></li>
        <li><a href="javascript:void(0);" onclick="change_iframe_url('hindu_temple')"><i class="icon-home2"></i> Local Temple</a></li>
    </ul>

    <div class="clear"></div>


    <div class="tabs side-tabs nobottommargin clearfix">

        <div class="tab-container">
            <div class="tab-content clearfix" id="tabs-22">

            </div>
            <div class="tab-content clearfix" id="tabs-23">

            </div>
            <div class="tab-content clearfix" id="tabs-24">

            </div>


        </div>




        <iframe id="iframemap" src="<?php echo url(); ?>/api/nearby-map.php?map_address={{$map_address}}&&map_type=food" width="800" height="600" frameborder="0" style="border:0;margin:0px;padding:0px;overflow:hidden;" allowfullscreen></iframe>



    </div>

@else
    <p> {{ trans('messages.1001') }}  </p>
@endif
