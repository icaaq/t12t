<!doctype html>
<html lang="sv">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<title>Tillgängligare chips valuta</title>
	<style type="text/css" media="screen">
	html{
	font-family:arial;
	background:url(bg.png) no-repeat 0 0;
	}
	fieldset{
	margin:78px 0 0 30px;
	padding:0;
	border:0;

	}
	legend + label{
	margin:130px 0 0 10px;
	display:inline-block;
	}
	span{
	display:block;
	}
	label{
	float:left;
	}
	input{
	border:1px solid #666;
	padding:10px;
	font-size:2em;
	}
	button{
	border:1px solid #666;
	background:#eee;
	padding:20px 5px;
	margin:150px 0 0 10px;
	display:inline-block;
	}
	p{
	margin:10px 0 0 10px;
	font-size:1.8em;
	}
	footer{
	position:absolute;
	top:380px;
	}
	footer p{
	color:#666;
	font-size:small;
	}
	</style>
	<script> 
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-22732942-1']);
		_gaq.push(['_trackPageview']);
		(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);})();
	</script>
</head>

<body>
	<fieldset>
		<legend>Valutaomvandlare</legend>
		<label for="amount">
			<span>Från</span>
			<input id="amount" placeholder="Skriv din summa här" type="number"/>
		</label>
		<button id="convert"> Omvandla nu</button>
		<p id="result" aria-live="assertive"></p>
	</fieldset>
	<footer role="contentinfo">
		<p>Detta är bara en tillgängligare variant av <a href="http://chipsvaluta.se/">orginalet!</a></p>
	</footer>
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script>
		$(function () {
			$("#convert").click(function(){
				if($("#amount").length>0){
					$("#result").text("För "+$("#amount").val() + " SEK får du "+ Math.floor($("#amount").val() / 33)+" st chipspåsar");
				}
			});
		});
	</script>
</body>
</html>