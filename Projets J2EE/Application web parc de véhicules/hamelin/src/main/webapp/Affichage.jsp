<%@page import="devoir_pwa_partie2.hamelin_ammari.GestionBd"%>
<%@page import="java.sql.PreparedStatement"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Les Vehicules déja enregistrés </title>
<%@ page import="java.sql.ResultSet" %>
<%@ page import="java.sql.Connection" %>
<%@ page import="java.sql.DriverManager" %>

</head>
<body>
<%
try
    {
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection con=(Connection)DriverManager.getConnection(
            "jdbc:mysql://localhost:3306/vehicule","root","");

        
        PreparedStatement st = con.prepareStatement("SELECT * FROM vehicule"); 
        ResultSet rs= st.executeQuery(); 
    %>
    <h1 style="text-align:center"> Listes des véhicules enregistrés:</h1>
    <p >
    <table border=1 align=center style="text-align:center">
      <thead>
          <tr>
             <th>IMMATRICULATION</th>
             <th>MODELE</th>
             <th>KILOMETRAGE</th>
             <th>TYPE</th>
             <th>Nombre de places</th>
             <th>Carburant</th>
             <th>Date de première mise en service</th>
             <th>Date dachat</th>
             <th>Date de prochaine révision</th>
          </tr>
      </thead>
      <tbody>
        <%while(rs.next())
        {
            %>
            <tr>
                <td><%=rs.getString("immatriculation") %></td>
                <td><%=rs.getString("modele") %></td>
                <td><%=rs.getString("kilometrage") %></td>
                <td><%=rs.getString("type") %></td>
                <td><%=rs.getString("nbreDePlaces") %></td>
                <td><%=rs.getString("carburant") %></td>
                <td><%=rs.getString("dateDePremiereMiseEnScene") %></td>
                <td><%=rs.getString("dateDachat") %></td>
                <td><%=rs.getString("dateDeProchaineRevision") %></td>
            </tr>
            <% }%>
           </tbody>
        </table><br>
    <%}

    catch(Exception e){
    	 e.printStackTrace();
    }

    %>
    <p> <p>
   
<form style="text-align: center"  method="post" action="ServletVehicule">
<tr>
<td >
<input type="submit" value="Cliquez ici si vous voulez supprimer un véhicule" name="supprimer" >
</td>
</tr>
<tr>
<td>
<input type="submit" value="Cliquez ici si vous voulez mettre à jour des informations concernant le véhicule" name="update" >
</td>

<td>
<input type="submit" value="Cliquez ici si vous voulez ajouter un véhicule" name="createNewVehicule" >
</td>
</tr>
</form>

</body>
</html>