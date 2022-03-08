<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.Vehicule"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.GestionBd"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.ApprovisionnementCarburant"%>
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

        
        PreparedStatement st = con.prepareStatement("SELECT * FROM carburant"); 
        ResultSet rs= st.executeQuery(); 
    %>
    <h1 style="text-align:center"> Les approvisionnement en carburant déja enregistrés:</h1>
    <p >
    <table border=1 align=center style="text-align:center">
      <thead>
          <tr>
             <th>id</th>
             <th>immatriculation du véhicule</th>
          </tr>
      </thead>
      <tbody>
        <%while(rs.next())
        {
            %>
            <tr>
                
                <td><%=rs.getString("id") %></td>
                <td><%=rs.getString("immVehicule") %>
            </tr>
            <%}%>
           </tbody>
        </table><br>
    <%}

    catch(Exception e){
    	 e.printStackTrace();
    }

    %>
    <p> <p>
<form  method="post" action="ServletVehicule">

<tr>
<td>
<p style="text-align:center" > Veuillez entrer l'identifiant du carburant que vous voulez mettre à jour
</td>
<td>
<input type="text" name="idAppCarburant"  id="idAppCarburant">
</td>
</tr>
</form>
</body>
</html>