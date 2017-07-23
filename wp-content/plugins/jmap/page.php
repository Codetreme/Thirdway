
<?php
/*
New Map entries
*/

global $jmaps_options;
ob_start();?>
<div class="wrap">
<form action="options.php" method="POST">
  <?php settings_fields('jmapsgroup'); ?>
  <h1>Welcome to Jay Maps Settings</h1>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <h3>Location Name</h3>
      <input type="text" name="jmapssettings[name]"><?php echo $jmaps_options['name'];?>
    </div>
    <div class="col-md-4">
      <h3>Address</h3>
      <textarea  name="jmapssettings[address]" rows="5" cols="50"/><?= $jmaps_options['address'];?> </textarea>
    </div>
    <div class="col-md-4">
      <h3>Latitude</h3>
      <input type="text" name="jmapssettings[latitude]"><?= $jmaps_options['latitude'];?>
    </div>
    <div class="col-md-4">
      <h3>Longitude</h3>
      <input  type="text" name="jmapssettings[longitude]"><?= $jmaps_options['longitude'];?>
    </div>

  </div>
  <hr>
  <input class="button-primary" type="submit" value="Save">
</form>
</div>

<?php echo ob_get_clean();
