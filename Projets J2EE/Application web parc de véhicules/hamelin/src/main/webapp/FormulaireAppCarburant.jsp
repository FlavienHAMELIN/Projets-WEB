<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
</br>
</br>
<h1 style="text-align:center">Formulaire pour ajouter un approvisionemment en carburant pour le véhicule: </h1>
</br>
</br>

<form style="text-align: center"method="post" action="ServletVehicule">

<tr>
<td>
<p> Immatriculation Vehicule pour l'approvisionnement
</td>
<td>
<input type="text" name="AppCarbVehicule"  id="AppCarbVehicule" required>
</td>
</tr>

<tr>
<td>
<p> Date
</td>
<td>
<input type="date" name="dateAppCarb"  id="dateAppCarb" required>
</td>
</tr>

<tr>
<td>
<p> Quantite
</td>
<td>
<input type="text" name="Quantite"  id="qt" required>
</td>
</tr>


<tr>
<td>
<p> Prix unitaire
</td>
<td>
<input type="text" name="prixUnitaire"  id="prixUnitaire" required>
</td>
</tr>
  
<p>
<tr>
<td>
  <input type="submit" value="Ajout un nouveau approvisionnement pour le véhicule" name="boutonAppCarb" >
  </td>
  <td>
</tr>

</form>

<form style="text-align:center" method="post" action="ServletVehicule"> 
<tr>
<td>
<input type="submit" value="Lister tous les véhicules" name="ListerAppCarbVe" >
</td> 
 </tr> 
</form>

<p>
<%
try
    {
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection con=(Connection)DriverManager.getConnection(
            "jdbc:mysql://localhost:3306/vehicule","root","");

        
        PreparedStatement st = con.prepareStatement("SELECT * FROM vehicule"); 
        ResultSet rs= st.executeQuery(); 
    %>
    <p >
    <h2 align=center style="text-align:center" >Listes des immatriculations avec les modèles</h2>
    <table border=1 align=center style="text-align:center">
      <thead>
          <tr>
             <th>IMMATRICULATION</th>
             <th>MODELE</th>
          </tr>
      </thead>
      <tbody>
        <%while(rs.next())
        {
            %>
            <tr>
                <td><%=rs.getString("immatriculation") %></td>
                <td><%=rs.getString("modele") %></td>
            </tr>
            <% }%>
           </tbody>
        </table><br>
    <%}

    catch(Exception e){
    	 e.printStackTrace();
    }

    %>
<p>


</body>
</html>