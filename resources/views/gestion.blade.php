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
        <h1>Bienvenue dans votre espace!</h1>

        <!--Ici, liste des noms, prenom, mail de l'utilisateur-->

        <!--Ici, liste des mails de l'utilisateur, avec l'image associée et le bouton upload-->
        <ul>
            <li>MailExample@hotmail.com    <button>Upload</button>   Ici afficher l'image liée</li>
        </ul>

        </br>
        <h2>Lier un mail et une image a votre compte</h2>
        <form method="POST" action="{{ route('gestion') }}" enctype="multipart/form-data">
            @csrf
			Mail<input name="mail"></input></br>
			Image<input type="file" name="imageUpload"/></br>
            <button type="submit">Ajouter'</button>   
        </form>
    </body>
</html>