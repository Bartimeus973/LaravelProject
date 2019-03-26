<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initialscale=1" />
		<link href= {{ url('css/site.css') }} rel="stylesheet" type="text/css">
		<title>Accueil</title>
	</head>
	<body>
		<nav id="nav1">
			<a href="{{ route('identification') }}" class="lienBlanc"><h2>Identification</h2></a><!--
			--><a href="{{ route('inscription') }}" class="lienBlanc"><h2>Inscription</h2></a>
		</nav>
        <h1>Bievenue sur notre site!</h1>
		<button>Identifiez Vous!</button>
        <button>Pas de compte? Inscrivez vous!</button>
    </body>
</html>