<%@page import="devoir_pwa_partie2.hamelin_ammari.ApprovisionnementCarburant"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.GestionBd"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.Vehicule"%>
<%@page import="java.sql.PreparedStatement"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<%@ page import="java.sql.ResultSet" %>
<%@ page import="java.sql.Statement" %>
<%@ page import="java.sql.Connection" %>
<%@ page import="java.sql.DriverManager" %>
<body>
<%
try
    {
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection con=(Connection)DriverManager.getConnection(
            "jdbc:mysql://localhost:3306/vehicule","root","");
        PreparedStatement st = con.prepareStatement("SELECT * FROM vehicule WHERE immatriculation = ?");
        st.setString(1,request.getParameter("ImmatriculationUpdate"));
        ResultSet rs= st.executeQuery(); 
        Vehicule v=GestionBd.findVehiculeByImm(request.getParameter("ImmatriculationUpdate"));
    %>
    
    

<h3 style="text-align:center"> Listes des informations précédemment enregistrés pour le véhicule d'immatriculation: <%=v.getImmatriculation() %> et de modèle: <%=v.getModele() %></h3>

<form style="text-align: center" method="post" action="ServletVehicule">

 <%while(rs.next())
        {
            %>
<tr>
<td>
<p> Immatriculation
</td>
<td>
<input type="text" name="Imm"  id="imm" value="<%=rs.getString("immatriculation")%>">
<input type="text" name="oldImm"  id="imm" value="<%=request.getParameter("ImmatriculationUpdate") %>" hidden>
</td>
</tr>

<tr>
<td>
<p> Modele
</td>
<td>
<input type="text" name="mod"  id="modele" value="<%=rs.getString("modele") %>">
</td>
</tr>

<tr>
<td>
<p> Kilometrage
</td>
<td>
<input type="text" name="km"  id="kilometrage" value="<%=rs.getString("kilometrage") %>">
</td>
</tr>



<tr>
<td>
<p> Type:
</td>
<td>

<%
String typeChecked=rs.getString("type");
if (typeChecked.equals("3")){ %>
<input type="radio" name="type" value ="3" id="p3" checked="checked">
<label for="p3">3</label>
</td>
<td>
<input type="radio" name="type" value ="5" id="p5">
<label for="p5">5</label>
</td>
<%}else if(typeChecked.equals("5")){ %>

<input type="radio" name="type" value ="3" id="p3">
<label for="p3">3</label>
</td>
<td>
<input type="radio" name="type" value ="5" id="p5"checked="checked">
<label for="p5">5</label>
</td>

<%} %>
</tr>



<tr>
<td>
<p> Nombre de places
</td>
<td>
<input type="text" name="NbPlaces"  id="nbr"value="<%=rs.getString("nbreDePlaces") %>">
</td>
</tr>



<tr>
<td>
<p> Carburant:
</td>
<td>
<%String carburant=rs.getString("carburant");
if (carburant.equals("Electrique")){
%>
<input type="radio" name="carb" value ="Electrique" id="c1" checked="checked">
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carb" value ="Hydrogene" id="c2">
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carb" value ="Essence" id="c3">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carb" value ="Diesel" id="c4">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carb" value ="GPL" id="c5">
<label for="c5">GPL</label>
</td>
<%}else if (carburant.equals("Hydrogene")){ %>
<input type="radio" name="carb" value ="Electrique" id="c1" >
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carb" value ="Hydrogene" id="c2" checked="checked">
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carb" value ="Essence" id="c3">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carb" value ="Diesel" id="c4">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carb" value ="GPL" id="c5">
<label for="c5">GPL</label>
</td>
<%}else if (carburant.equals("Essence")){ %>
<input type="radio" name="carb" value ="Electrique" id="c1" >
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carb" value ="Hydrogene" id="c2" >
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carb" value ="Essence" id="c3" checked="checked">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carb" value ="Diesel" id="c4">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carb" value ="GPL" id="c5">
<label for="c5">GPL</label>
</td>
<%}else if(carburant.equals("Diesel")){ %>
<input type="radio" name="carb" value ="Electrique" id="c1" >
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carb" value ="Hydrogene" id="c2" >
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carb" value ="Essence" id="c3">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carb" value ="Diesel" id="c4" checked="checked">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carb" value ="GPL" id="c5">
<label for="c5">GPL</label>
</td>
<%}else if (carburant.equals("GPL")){ %>
<input type="radio" name="carb" value ="Electrique" id="c1" >
<label for="c1">Electrique</label>
</td>
<td>
<input type="radio" name="carb" value ="Hydrogene" id="c2">
<label for="c2">Hydrogene</label>
</td>
<td>
<input type="radio" name="carb" value ="Essence" id="c3">
<label for="c3">Essence</label>
</td>
<td>
<input type="radio" name="carb" value ="Diesel" id="c4">
<label for="c4">Diesel</label>
</td>
<td>
<input type="radio" name="carb" value ="GPL" id="c5" checked="checked">
<label for="c5">GPL</label>
</td>
<%}
	
 %>

</tr>

<tr>
<td>
<p> Date de première mise en service
</td>
<td>
<input type="date" name="DateService"  id="dateMiseEnService" value="<%=rs.getString("dateDePremiereMiseEnScene") %>">
</td>
</tr>

<tr>
<td>
<p> Date d'achat
</td>
<td>
<input type="date" name="DateAchat"  id="dateDachat" value="<%=rs.getString("dateDachat") %>">
</td>
</tr>
  
<tr>
<td>
<p> Date de prochaine révision
</td>
<td>
<input type="date" name="DateRevision"  id="dateRevision" value="<%=rs.getString("dateDeProchaineRevision") %>">
</td>
</tr>
<p>
<tr>
<td>
  <input type="submit" value="Update" name="updateVehicule" >
  </td>
  <td>
  <input type="submit" value="Lister tous les véhicules" name="boutonLister1" >
  </td>
</tr>
<%} %>
</form>
<p><p><p>
<h3 style="text-align:center"> Listes des approvisionnement enregistrés pour le véhicule d'immatriculation: <%=v.getImmatriculation() %> et de modèle: <%=v.getModele() %></h3>
<p >
<table border=1 align=center style="text-align:center">
      <thead>
          <tr>
          	 <th>Identifiant d'un approvisionnement en carburant</th>
             <th>Date d'approvisionnement en carburant</th>
             <th>Quantite d'approvisionnement en carburant</th>
             <th>prix unitaire d'approvisionnement en carburant</th>
             <th>montant d'un approvisionnement en carburant</th>
          </tr>
      </thead>
      <tbody>
<%
		for(ApprovisionnementCarburant elem: v.getListCarburant())
        {      	
%>

<tr>
<td><%=elem.getId()%>
</td>
<td><%=elem.getDate()%>
</td>

<td>
<%=elem.getQuantité()%>
</td>



<td>
<%=elem.getPrixUnitaire()%>
</td>

<td>
<%=elem.getMontant()%>
</td>
</tr>
<%} 

%>
</tbody>
        </table><br>
<form style="text-align: center" method="post" action="ServletVehicule" >
<input type="submit" name="SupprBtnAppCarb"  id="nbr"value="Supprimer un approvisionnement en carburant">
<input type="submit" name="UpdateBtnAppCarb"  id="nbr"value="Mettre à jour un approvisionnement en carburant">
<input type="submit" name="AjouterBtnAppCarb"  id="nbr"value="Ajouter un approvisionnement en carburant">
</form>        

<%}

    catch(Exception e){
    	 e.printStackTrace();
    }

    %>
</body>
</html>