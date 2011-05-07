<!DOCTYPE html>
<html lang="sv-SE">
<head>
        <meta charset="utf-8" />
        <title>Väder</title>
        <!--[if IE]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&amp;language=sv"></script>
		<style type="text/css" media="screen">
			#map{
				width:200px;
				height:200px;
				margin:10px;
			}
		</style>
		<script type="text/javascript">
				    var _gaq = _gaq || [];
				    _gaq.push(['_setAccount', 'UA-4080284-1']);
				    _gaq.push(['_trackPageview']);

				    (function() {
				        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
				    })();
				</script>
</head>
<body>
	<h1 aria-live="assertive">Hämtar tempratur och position…</h1>
	<a href="info.htm">Vem har gjort detta? och varför?</a>
	<div id="map"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"> </script>
<script>
	weather = function(){
		var lat = "",
		lon = "",
		geolocation = function(){
			if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					$.getJSON("weather.php?lat="+position.coords.latitude+"&long="+position.coords.longitude,function(response){
						if(response.temperature === 0){
							$("h1").text(response.temperature).append(" gradigt i "+response.location.results[1].formatted_address);
						}
						if(response.temperature > 0){
							$("h1").text(response.temperature).append(" grader varmt i "+response.location.results[1].formatted_address);
						}
						if(response.temperature < 0){
							$("h1").text(response.temperature).append(" grader kallt i "+response.location.results[1].formatted_address);
						}
						lat = position.coords.latitude;
						lon = position.coords.longitude;
						mapIt();
					});
				},function() {
					$("h1").text("Tyvärr kan din webbläsare kan inte dela med sig av sin position").prepend("<p>Försök att uppgradera till Internet Explorer 9, google chrome, firefox eller opera</p>");
				});
			}else{
				$("h1").text("Tyvärr kan din webbläsare kan inte dela med sig av sin position").prepend("<p>Försök att uppgradera till Internet Explorer 9, google chrome, firefox eller opera</p>");
			}
		}
		mapIt = function(){
			var map = new google.maps.Map(document.getElementById("map"),{
				zoom: 3,
				mapTypeControl: false,
				streetViewControl: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
				});

			// bind events for geocode
			//MCmap.initSearch();

			// set initialLocation To show map
			map.setCenter(new google.maps.LatLng(lat,lon));
			map.setZoom(14);
			marker = new google.maps.Marker({
					map: map,
					animation: google.maps.Animation.DROP,
					position: new google.maps.LatLng(lat,lon),
					visible: true,
			});
		}
		return {
			init:function(){
				geolocation();
			}
		}
	}().init();
</script>
</body>
</html>