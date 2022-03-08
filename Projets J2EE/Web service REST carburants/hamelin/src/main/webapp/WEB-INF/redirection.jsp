<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-
8859-1">
<title>Carburants</title>
</head>
<body>
    <p>Donn�es ajout�es avec succ�s dans la base de donn�es "stations" !<br><br></p>
	<p>
	Si vous souhaitez utiliser les donn�es de la base de donn�es : "stations", cliquez sur le bouton ci-dessous. <br>
	Apr�s avoir cliqu� vous avez les possibilit�s suivantes : <br><br>
		- afficher les donn�es sous format XML en filtrant avec le code postal en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=xml&cp=28000"<br>
		- afficher les donn�es sous format JSON en filtrant avec le code postal en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=json&cp=28000"<br>
		- afficher les donn�es sous format XML en filtrant avec le d�partement en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=xml&departement=28"<br>
		- afficher les donn�es sous format JSON en filtrant avec le d�partement en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=json&departement=28"<br>
		- modifier la valeur du prix d'un carburant dont on connait le nom dans une station dont on connait l'identifiant en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=modifier&pdv_id=1000001&carburant_nom=Gazole&carburant_valeur=2"<br>
		- supprimer un carburant dont on connait le nom dans une station dont on connait l'identifiant en utilisant la requ�te suivante par exemple : "http://localhost:8080/jpa/Servlet?action=supprimer&pdv_id=1000001&carburant_nom=Gazole"<br>
	</p><br><br>
	<form action="http://localhost:8080/jpa/Servlet" method="post">
		<button type="submit">Utiliser les donn�es de la base de donn�es : "stations"</button>
	</form>
	
	
	
	
</body>
</html>