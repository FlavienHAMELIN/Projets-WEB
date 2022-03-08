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







<form align=center style="text-align:center" method="post" action="ServletVehicule">

<tr>
<td>
<p> Veuillez entrer la plaque d'immatriculation du véhicule que vous voulez mettre à jour
</td>
<td>
<input type="text" name="ImmatriculationUpdate"  id="immatriculationUpdate">
</td>
</tr>
</form>
</body>
</html>