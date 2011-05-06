<!doctype html>
<html class="no-js" lang="sv">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Det är vecka <?php echo date("W") ?> idag.</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css" media="screen">
		body{
		background:#000;
		}
		h1{
		color:#f7ef07;
		font-size:220px;
		line-height:220px;
		text-align:center;
		margin:50px auto 0;
		}
		#main{
		position:absolute;
		top:0;
		bottom:0;
		left:0;
		right:0;
		}
		p{
		text-align:center;
		}
		a{
		color:#f7ef07;
		}
	</style>
	<script type="text/javascript"> 
	    var _gaq = _gaq || [];
	    _gaq.push(['_setAccount', 'UA-22732942-1']);
	    _gaq.push(['_trackPageview']);

	    (function() {
	        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
	    })();
	</script>
</head>

<body>
    <div id="main" role="main">
		<h1><?php echo date("W") ?></h1>
		<p><a href="info.htm">Varför detta?</a></p>
    </div>
</body>
</html>