<%@page import="devoir_pwa_partie2.hamelin_ammari.Vehicule"%>
<%@page import="devoir_pwa_partie2.hamelin_ammari.GestionBd"%>
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
        PreparedStatement st = con.prepareStatement("SELECT * FROM carburant WHERE id = ?");
       st.setString(1,request.getParameter("idAppCarburant"));
        ResultSet rs= st.executeQuery(); 
    %>
    
    


<form method="post" action="ServletVehicule">

 <%while(rs.next())
        {
            %>

<tr>
<td>
<p> Date
</td>
<td>
<input type="date" name="dateC"  id="dateC" value="<%=rs.getString("date") %>">
<input type="text" name="idC"  id="idC" value="<%=request.getParameter("idAppCarburant") %>" hidden>
</td>
</tr>

<tr>
<td>
<p> quantite
</td>
<td>
<input type="text" name="quantiteC"  id="quantite" value="<%=rs.getString("quantite") %>">
</td>
</tr>


<tr>
<td>
<p> prix unitaire
</td>
<td>
<input type="text" name="prixC"  id="prixC"value="<%=rs.getString("prixUnitaire") %>">
</td>
</tr>



<tr>
<td>
  <input type="submit" value="Updatec" name="updatecarb" >
  </td>
</tr>
<%
}

 %>
</form>
<%}

    catch(Exception e){
    	 e.printStackTrace();
    }

    %>
</body>
</html>