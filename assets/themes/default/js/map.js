var map = L.map('map').setView([38.714111, -9.136583], 10); 

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

function search(str) {
  $('#result-box').html("");
  $.ajax({ 
    type: 'GET', 
    url: "https://nominatim.openstreetmap.org/search.php?q="+str+"&format=json", 
    data: { get_param: 'value' }, 
    dataType: 'json',
    success: function (data) { 
      $.each(data, function(index, element) {
        var result = '<div class="result"  onclick="zoom('+element.lat+', '+element.lon+')"><div class="name" title="'+element.display_name+'">'+element.display_name+'</div><img src="'+element.icon+'" title="'+element.type+'"><div class="coor"><label>Lat.:</label><span>'+element.lat+'</span><label>Long.:</label><span>'+element.lon+'</span></div></div>';
        $('#result-box').append(result);
      });
    }
  });
}

function zoom(x, y) {
  map.panTo(new L.LatLng(x, y));	
}

map.on('mouseover', function(e) {
  var hlat = e.latlng.lat;
  var hlon = e.latlng.lng;
  
  
  $('#map-info').html("");
  
  $.ajax({ 
    type: 'GET', 
    url: "https://nominatim.openstreetmap.org/reverse?format=xml&lat="+hlat+"&lon="+hlon+"&zoom=18", 
    data: { get_param: 'value' }, 
    dataType: 'xml',
    success: function (data) {
      $(data).find("reversegeocode").each(function(){
        var result1 = $(this).find("result").text();
        $('#map-info').append(result1);
      });     
    }
  });
  
  $.ajax({
    dataType: "json",
    url: "api/weather?lat="+hlat+"&lon="+hlon+"&days=5", 
    success: function(result){
      var weather = result;
      
      $("#current-weather .temp").html(weather.current.temperature.celsius + 'ºC');
      $("#current-weather .cond").html(weather.current.condition);
      $("#current-weather .humid").html(weather.current.humidity + '% Humidity');
    }
  });
  
});