<link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/themes/default/css/map.min.css">

<link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/plugins/leaflet/leaflet.css">
<link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/plugins/leaflet/leaflet-search-master/src/leaflet-search.css">	

<div id="map-wrap">
  <div id="map-left">
    <div id="map-box">
      <div id="map" class="map"></div>      
    </div>
    
    <div id="side-box">
      <input type="text" name="" id="map_search_input" onkeyup="search(this.value)" placeholder="Search Location">
      <div id="result-box">
        
      </div>
    </div>
  </div>
  <div id="map-right">
    <div id="map-info">
      
    </div>
    <div id="weather-wrap">
      <div id="current-weather">
        <div class="temp"></div>
        <div class="cond"></div>
        <div class="humid"></div>
      </div>
    </div>
  </div>    
  
</div>

<script type="text/javascript" src="<?= $site['baseURL'] ?>assets/plugins/leaflet/leaflet.js"></script>
<script type="text/javascript" src="<?= $site['baseURL'] ?>assets/plugins/leaflet/leaflet-search-master/src/leaflet-search.js"></script>

<script type="text/javascript" src="<?= $site['baseURL'] ?>assets/themes/default/js/map.js"></script>

<script type="text/javascript" src="<?= $site['baseURL'] ?>assets/plugins/leaflet/leaflet-search-master/src/leaflet-search-geocoder.js"></script>