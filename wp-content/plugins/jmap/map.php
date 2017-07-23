<?php

//function map_admin_page(){

global $wpdb;
$locs=array();
$loc1=array();
$loc2=array();
$loc3=array();
$SqlMarker= "SELECT * from map_markers";
$marker=$wpdb->get_results($SqlMarker);

foreach($marker as $loc):
$locs =$loc;

  //echo $locs->id;
  if($locs->id==1):
    $loc1=$locs;
    elseif ($locs->id==2):
      $loc2=$locs;
    elseif($locs->id==3) :
      $loc3=$locs;
  endif;
endforeach;
     ?>
    <hr>
    <div id="map"></div>

    <div class="container">
              <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDxZr4_4KbhBUya6mNYCbc-0Zo_cnDZmH0"></script>
            <div id="map_canvas" style="height: 450px; width: 100%;">
              <script type="text/javascript">
                function init_map(){

                  var myOptions = {zoom:14,center:new google.maps.LatLng(<?=$loc1->lat?>,<?=$loc1->lng?>),
                  mapTypeId: google.maps.MapTypeId.ROADMAP};
                  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                  marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?=$loc1->lat?>,<?=$loc1->lng?>)});
                  marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?=$loc2->lat?>,<?=$loc2->lng?>)});
                      marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?=$loc3->lat?>,<?=$loc3->lng?>)});
                  // infowindow = new google.maps.InfoWindow({content:"<div class='noScroll'><b><?php //$loc1->address?></div>" });
                  google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
                  infowindow.open(map,marker);}
                  google.maps.event.addDomListener(window, 'load', init_map);

                  window.addEventListener('load', function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(30.267074, -97.743473)
    });

    // See Github for class https://github.com/defvayne23/SVGMarker
    var marker = new SVGMarker({
      map: map,
      position: new google.maps.LatLng(30.282788, -97.731457),
      icon: {
        anchor: new google.maps.Point(30, 30.26),
        size: new google.maps.Size(60,30.26),
        url: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/134893/pin-red.svg'
      }
    })
  });
              </script>
</div>

<?php
//}
// Admin tab
// function map_admin_tab(){

// add_menu_page('Jay Map','Jay Map','manage_options',__FILE__,'map_admin_page');
// }
// add_action('admin_menu','map_admin_tab');

// //register plugin settings
// function capabilities_settings(){
// register_setting('mapgroup','mapsettings');
// }
// add_shortcode('my_map','map_admin_page');
 ?>

 