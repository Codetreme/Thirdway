<?php
/*
Plugin Name: Jay Maps
Plugin URI: http://www.lehlohonolo-m.co.za/downloads
Description: Google Maps Plugin
Author: Lehlohonolo Motsoeneng
Author URI: http://www.lehlohonolo-m.co.za
Version: 1.0
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/



//stylesheets

// wp_register_style('main-style',plugin_dir_path(__FILE__).'css/style.css');
// wp_enqueue_style('main-style');
//globals

// Setting 
$jmaps_options=get_option('jmapssettings');
$name=$jmaps_options['name'];
$location=$jmaps_options['location'];
$latitude=$jmaps_options['latitude'];
$longitude=$jmaps_options['longitude'];



  // Installing function on plugin activate
  function jmaps_install(){
    global $wpdb;
    $collate=$wpdb->get_charset_collate();

    // Creating table for Maps
    $sqlMap ="CREATE TABLE wp_jay_maps(
           id int(11) not null auto_increment primary key,
           name varchar(45) not null,
           date_created TIMESTAMP default CURRENT_TIMESTAMP
            )$collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);

            // Creating table for Map Markers
    $sqlMapMarkers ="CREATE TABLE wp_jay_map_markers(
           id int(11) not null auto_increment primary key,
           map_id int(11) not null,
           name varchar(45) not null default Unnamed,
           lat varchar(45) not null,
           long varchar(45) not null,
           date_created TIMESTAMP default CURRENT_TIMESTAMP
            )$collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sqlMapMarkers);

  }
register_activation_hook(__FILE__,'jmaps_install');

  // Plug deactivation function
  function jmaps_uninstall(){

    global $wpdb;
    $sqlMaps="DROP TABLE wp_jay_maps";
    $wpdb->query($sqlMaps);

     $sqlMapMarkers="DROP TABLE wp_jay_map_markers";
      $wpdb->query($sqlMapMarkers);

  }
  register_deactivation_hook(__FILE__,'jmaps_uninstall');

// Admin page

function jmap_admin_page(){
global $wpdb;
  $id;
  $name;
  $date_created;
  $sqlMaps = "SELECT * from map";
  $maps = $wpdb->get_results($sqlMaps);
  //echo $BaseUrl . ' - ' .$PluginUrl. '<br/>';
  ob_start(); ?>
<?php
  $locs=array();
  $loc1=array();
 
  $SqlMarker= "SELECT * from map_markers";
  $marker=$wpdb->get_results($SqlMarker);

    foreach($marker as $loc):
        $locs =$loc;
      //echo $locs->id;
      if($locs->id==1):
          $loc1=$locs;
      endif;
    endforeach;
  ?>
  
   
    <div class="container">
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDxZr4_4KbhBUya6mNYCbc-0Zo_cnDZmH0"></script>
            <div id="map_canvas" style="height: 400px; width: 60%;">
              <script type="text/javascript">
                function init_map(){

                  var myOptions = {zoom:18,center:new google.maps.LatLng(<?=$loc1->lat?>,<?=$loc1->lng?>),
                  mapTypeId: google.maps.MapTypeId.ROADMAP};
                  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                  marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?=$loc1->lat?>,<?=$loc1->lng?>)});
                  // /marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?=$loc4->lat?>,<?=$loc4->lng?>)});
                  // infowindow = new google.maps.InfoWindow({content:"<div class='noScroll'><b><?php //$loc1->address?></div>" });
                  google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
                  infowindow.open(map,marker);}
                  google.maps.event.addDomListener(window, 'load', init_map);
              </script>
            </div>
    </div>
   
  <?php
    echo ob_get_clean();
}

// Admin tab
function map_admin_tab(){ 
//add_options_page('Jay Maps','Jay Maps','manage_options',__FILE__,'jmap_options_page');
add_menu_page('Jay Maps','Jay Maps','manage_options',__FILE__,'jmap_admin_page');
//add_submenu_page('Subemenu Page','Subemenu Page','admin-menu',__FILE__,'jmap_add_page');
}
add_action('admin_menu','map_admin_tab');

function insert_map(){
 if(isset($_POST['Save'])):
  $name = $_POST['name'];
  $address = $_POST['address'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];

  $sqlInsertMap="INSERT INTO wp_jay_maps(name)values(".'$name'.")";
  $wpdb->query($sqlMaps);

  $sqlInsertMarker="INSERT INTO wp_jay_map_markers(name,address,lat,lng)values(
  (SELECT id from wp_jay_maps),".'$name,$address,$lat,$lng'.")";
  $wpdb->query($sqlMaps);
 endif;
  
}
do_action('insert_map');
//register settings
function jmaps_settings(){
  register_setting('jmapsgroup','jmapssettings');
}
add_action('admin_init','jmaps_settings');

//plugin shortcode
add_shortcode('jmap','jmap_admin_page');

