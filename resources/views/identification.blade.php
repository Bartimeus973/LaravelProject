<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initialscale=1" />
		<link href= {{ url('css/site.css') }} rel="stylesheet" type="text/css">
		<title>Identification</title>
	</head>
	<body>
		<nav id="nav1">
			<a href="{{ route('identification') }}" class="lienBlanc"><h2>Identification</h2></a><!--
			--><a href="{{ route('inscription') }}" class="lienBlanc"><h2>Inscription</h2></a>
		</nav>
		
		<h2>Identification</h2>
		<form method="POST" action="{{ route('identification') }}">
            @csrf
			Mail<input name="mail"></input></br>
			Mot de passe<input name="password"></input></br>
            <button type="submit">S'identifier!'</button>   
        </form>
    </body>
</html>