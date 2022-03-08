<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Mon formulaire</title>
</head>
<body >
</br>
</br>
<h1 style="text-align:center">Formulaire pour ajouter un véhicule: </h1>
</br>
</br>

<form style="text-align: center"method="post" action="ServletVehicule">

<tr>
<td>
<p> Immatriculation
</td>
<td>
<input type="text" name="Immatriculation"  id="immatriculation" required>
</td>
</tr>

<tr>
<td>
<p> Modele
</td>
<td>
<input type="text" name="Modele"  id="modele" required>
</td>
</tr>

<tr>
<td>
<p> Kilometrage
</td>
<td>
<input type="text" name="Kilometrage"  id="kilometrage" required>
</td>
</tr>

<tr>
<td>
<p> Type:
</td>
<td>
<input type="radio" name="p" value ="3" id="p3" checked="checked">
<label for="p3">3</label>
</td>
<td>
<input type="radio" name="p" value ="5" id="p5">
<label for="p5">5</label>
</td>
</tr>

<tr>
<td>
<p> Nombre de places
</td>
<td>
<input type="text" name="NbreDePlaces"  id="nbr" required>
</td>
</tr>

<tr>
<td>
<p> Carburant:
</td>
<td>
<input type="radio" name="carburant" value ="Electrique" id="c1" checked="checked">
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carburant" value ="Hydrogene" id="c2">
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carburant" value ="Essence" id="c3">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carburant" value ="Diesel" id="c4">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carburant" value ="GPL" id="c5">
<label for="c5">GPL</label>
</td>
</tr>

<tr>
<td>
<p> Date de première mise en service
</td>
<td>
<input type="date" name="DateDePremiereMiseEnService"  id="dateMiseEnService" required>
</td>
</tr>

<tr>
<td>
<p> Date d'achat
</td>
<td>
<input type="date" name="DateDachat"  id="dateDachat" required>
</td>
</tr>
  
<tr>
<td>
<p> Date de prochaine révision
</td>
<td>
<input type="date" name="DateDeProchaineRevision"  id="dateRevision" required>
</td>
</tr>
<p>
<tr>
<td>
  <input type="submit" value="Ajout du nouveau véhicule" name="boutonCreation" >
  </td>
  <td>
</tr>

</form>

<form style="text-align:center" method="post" action="ServletVehicule">
  <input type="submit" value="Lister tous les véhicules" name="boutonLister">
  </td>
</form>
<p>


</body>
</html>