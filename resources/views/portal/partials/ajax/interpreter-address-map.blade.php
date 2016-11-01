<?php /* ?>
@if(!empty($interpreterAddress[0]))


    <h4>{{$interpreterAddress[0]->name}}</h4>
    <p>{{strip_tags($interpreterAddress[0]->address)}}</p>
    <?php
    //$map_address = "No:21, Greams Lane, Off Greams Road, Chennai, Tamil Nadu 600006";
    if($interpreterAddress[0]->address!="" && $interpreterAddress[0]->longitude=="" && $interpreterAddress[0]->latitude=="") {
    $map_address=$interpreterAddress[0]->name.','.strip_tags($interpreterAddress[0]->address);
    // address to map
    $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
    $lat_long = get_object_vars(json_decode(file_get_contents($url)));
    if($lat_long['status']=='OK') {
    // pick out what we need (lat,lng)
    $lng_value=$lat_long['results'][0]->geometry->location->lng;
    $lat_value=$lat_long['results'][0]->geometry->location->lat;
    $place_value=$lat_long['results'][0]->place_id;
    //var_dump($lat_long);
    $lat_long = $lat_long['results'][0]->geometry->location->lat . "," . $lat_long['results'][0]->geometry->location->lng;
    //echo $lat_long;
    $name_value=$interpreterAddress[0]->name;
    ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15546.38439880065!2d{{$lng_value}}!3d{{$lat_value}}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s{{$place_value}}!2s{{$name_value}}!5e0!3m2!1sen!2s!4v1455960627938" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <?php
    }
    ?>
    <?php
    }
    else
    {
    // pick out what we need (lat,lng)
    $lng_value=$interpreterAddress[0]->longitude;
    $lat_value=$interpreterAddress[0]->latitude;
    $place_value="";
    //var_dump($lat_long);
    $lat_long = $interpreterAddress[0]->latitude . "," . $interpreterAddress[0]->latitude;
    //echo $lat_long;
    $name_value=$interpreterAddress[0]->name;
    ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15546.38439880065!2d{{$lng_value}}!3d{{$lat_value}}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s{{$place_value}}!2s{{$name_value}}!5e0!3m2!1sen!2s!4v1455960627938" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <?php
    }
    ?>
@else
    <p> {{ trans('messages.1001') }}  </p>
@endif
<?php */ ?>


@if(!empty($interpreterAddress[0]))


    <h4>{{$interpreterAddress[0]->name}}</h4>
    <p>{{strip_tags($interpreterAddress[0]->address)}}</p>
    <?php
    //$map_address = "No:21, Greams Lane, Off Greams Road, Chennai, Tamil Nadu 600006";
    if($interpreterAddress[0]->address!="") {
    $map_address=$interpreterAddress[0]->name.','.strip_tags($interpreterAddress[0]->address);
    // address to map
    $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
    $lat_long = get_object_vars(json_decode(file_get_contents($url)));
    if($lat_long['status']=='OK') {
    // pick out what we need (lat,lng)
    $lng_value=$lat_long['results'][0]->geometry->location->lng;
    $lat_value=$lat_long['results'][0]->geometry->location->lat;
    $place_value=$lat_long['results'][0]->place_id;
    //var_dump($lat_long);
    $lat_long = $lat_long['results'][0]->geometry->location->lat . "," . $lat_long['results'][0]->geometry->location->lng;
    //echo $lat_long;
    $name_value=$interpreterAddress[0]->name;
    ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15546.38439880065!2d{{$lng_value}}!3d{{$lat_value}}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s{{$place_value}}!2s{{$name_value}}!5e0!3m2!1sen!2s!4v1455960627938" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <?php
    }
    ?>
    <?php
    }
    ?>
@else
    <p> {{ trans('messages.1001') }}  </p>
@endif