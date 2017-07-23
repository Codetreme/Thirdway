<?php
//stylesheets

wp_register_style('main-style',plugin_dir_path(__FILE__).'css/style.css');
wp_enqueue_style('main-style');
//globals

$jmaps_options=get_option('jmapssettings');
$name=$jmaps_options['name'];
$location=$jmaps_options['location'];
$latitude=$jmaps_options['latitude'];
$longitude=$jmaps_options['longitude'];

//options page
function jmap_options_page(){
  global $wpdb;
  $id;
  $name;
  $date_created;
  $sqlMaps = "SELECT * from map";
  $maps = $wpdb->get_results($sqlMaps);
  //echo $BaseUrl . ' - ' .$PluginUrl. '<br/>';
  ob_start(); ?>
  <div class="wrap">
    <h1>Welcome To Maps</h1>
      <p>To view more products visit website: <a href="//www.lehlohonolo-m.co.za/downloads">Lehlohonolo Motsoeneng</a>
      Thank You!!!
      </p>
      <div>
         <button class="button-primary" onclick="window.location.href='admin.php?page=page.php'">Add New Map</button>
      </div>
      <hr>
    <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date Created</th>
          <th>Locations</th>
          <th>Actions</th>
          <?php foreach($maps as $map):
            $sqlMarkers="SELECT count(id)from map_markers where map_id=".$map->id;
            $markers=$wpdb->get_var($sqlMarkers);
          ?>
            <tr>
                <td>
                  <?= $map->id?>
                </td>
                <td>
                  <?= $map->name?>
                </td>
                <td>
                  <?= $map->date_created?>
                </td>
                <td>
                  <?= $markers?>
                </td>
                <td>
                  <button class="button-edit button">Edit</button>
                </td>
                <td>
                <button class="button-delete button">Delete</button>

                </td>

          <?php endforeach; ?>
            </tr>
        </tr>
    </table>
  </div>
  <?php
    echo ob_get_clean();
}

function jmap_admin_page(){
  
wp_register_style('main-style',plugin_dir_path(__FILE__).'css/style.css');
wp_enqueue_style('main-style');

global $wpdb;
  $id;
  $name;
  $date_created;
  $sqlMaps = "SELECT * from map";
  $maps = $wpdb->get_results($sqlMaps);
  //echo $BaseUrl . ' - ' .$PluginUrl. '<br/>';
  ob_start(); ?>
  <style type="text/css">
        
      </style>
  <div class="wrap">
    <h1>Welcome To Maps</h1>
      <p>To view more products visit website: <a href="//www.joseplanet.co.za/downloads">Lehlohonolo Motsoeneng</a> and please review this plugin.
      Thank You!!!
      </p>
      <div>
         <button class="button-primary" onclick="myFunction()" data-rel="popup">Add New Map</button>
      </div>
      <hr>
      <div class="popup"> 
          <div class="popuptext" id="myPopUp">
            <form action="<?=$home?>wp-content/plugins/jmap/map.php" method="POST">
                 <h3 style="color: #fff">New Map</h3>
                    <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Name</label>
                      <input type="text" name="name" width ="100px">
                    </div>
                      <label>Address</label>
                      <input type="text" name="name">
                 
                    <div class="col-md-3">
                      <label>Latitude</label>
                      <input type="text" name="name">
                      <label>Longitude</label>
                      <input type="text" name="name">
                    </div>
                  </div>
               <input type="submit" name="Save"/>
            </form>
          </div>
      </div>
      
      <script type="text/javascript">
        function myFunction(){
          var popup=document.getElementById("myPopUp");
          popup.classList.toggle("show");
        }

      </script>
    <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date Created</th>
          <th>Locations</th>
          <th>Actions</th>
          <?php foreach($maps as $map):
            $sqlMarkers="SELECT count(id)from map_markers where map_id=".$map->id;
            $markers=$wpdb->get_var($sqlMarkers);
          ?>
            <tr>
                <td>
                  <?= $map->id?>
                </td>
                <td>
                  <?= $map->name?>
                </td>
                <td>
                  <?= $map->date_created?>
                </td>
                <td>
                  <?= $markers?>
                </td>
                <td>
                  <button class="button-edit button">Edit</button>
                </td>
                <td>
                <button class="button-delete button">Delete</button>

                </td>

          <?php endforeach; ?>
            </tr>
        </tr>
    </table>
  </div>
<?php
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
    echo ob_get_clean();
}

// Admin tab
function map_admin_tab(){ 
//add_options_page('Jay Maps','Jay Maps','manage_options',__FILE__,'jmap_options_page');
add_menu_page('Jay Maps','Jay Maps','manage_options',__FILE__,'jmap_admin_page');
//add_submenu_page('Subemenu Page','Subemenu Page','admin-menu',__FILE__,'jmap_add_page');
}
add_action('admin_menu','map_admin_tab');

//register settings
function jmaps_settings(){
  register_setting('jmapsgroup','jmapssettings');
}
add_action('admin_init','jmaps_settings');

//plugin shortcode
add_shortcode('jmaps','map_admin_page');





//class WP_Jay_Maps{

  // Constructor

  function __construct(){

    //add_action('admin_menu','jmaps_add_menu');
    //register_activation_hook(__FILE__,'jmaps_install');
    //register_deactivation_hook(__FILE__,'jmaps_uninstall');
  }

    // Loading admin menu
  function jmaps_add_menu(){
    add_menu_page('Jay Maps','Jay Maps','manage_options','jmaps-dashboard',__FILE__,'jmaps_page');
   
  }
   add_action('admin_menu','jmaps_add_menu');

  function jmaps_page(){
    
  }

  function jmaps_install(){
    global $wpdb;
    $collate=$wpdb->get_charset_collate();

    $sql ="CREATE TABLE wp_jay_maps(
           id int(11) not null auto_increment primary key,
           name varchar(45) not null,
           date_created TIMESTAMP default CURRENT_TIMESTAMP
            )$collate;";
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);

  }
register_activation_hook(__FILE__,'jmaps_install');
  function jmaps_uninstall(){

    global $wpdb;
    $sql="DROP TABLE wp_jay_maps";
    $wpdb->query($sql);

  }
  register_deactivation_hook(__FILE__,'jmaps_uninstall');

// }
//  new WP_Jay_Maps();