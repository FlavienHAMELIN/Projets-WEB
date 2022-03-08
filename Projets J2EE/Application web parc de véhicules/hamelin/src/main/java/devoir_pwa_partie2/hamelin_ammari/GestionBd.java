package devoir_pwa_partie2.hamelin_ammari;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class GestionBd {
	
	/*public static void main(String[] args) {
        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");
            Statement stmt=con.createStatement();  
            ResultSet rs=stmt.executeQuery("show databases;");
            System.out.println("Connected");  
        }
        catch(Exception e)
        {
            System.out.println(e);
        }
    }  
	*/
	
	 public static int registerVehicule(Vehicule vehicule) throws ClassNotFoundException {
	        String INSERT_USERS_SQL = "INSERT INTO vehicule" +
	            "  (immatriculation, modele, kilometrage, type,nbreDePlaces ,carburant, dateDePremiereMiseEnScene,dateDachat,dateDeProchaineRevision) VALUES " +
	            " (?, ?, ?, ?, ?, ?, ?, ?, ?);";

	        int result = 0;

	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try (Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	           PreparedStatement preparedStatement = connection.prepareStatement(INSERT_USERS_SQL)) {
	        	//preparedStatement.setString(0, vehicule.getImmatriculation());
	            preparedStatement.setString(1, vehicule.getImmatriculation());
	            preparedStatement.setString(2, vehicule.getModele());
	            preparedStatement.setString(3, vehicule.getKilometrage());
	            preparedStatement.setString(4, vehicule.getType());
	            preparedStatement.setString(5, vehicule.getNombreDePlaces());
	            preparedStatement.setString(6, vehicule.getCarburant());
	            preparedStatement.setString(7, vehicule.getDateDePremiereMiseEnScene());
	            preparedStatement.setString(8, vehicule.getDateDachat());
	            preparedStatement.setString(9, vehicule.getDateDeProchaineRevision());
	            System.out.println(preparedStatement);
	            // Step 3: Execute the query or update query
	            result = preparedStatement.executeUpdate();
	       

	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
	        return result;
	    }
	 		
	    private static void printSQLException(SQLException ex) {
	        for (Throwable e: ex) {
	            if (e instanceof SQLException) {
	                e.printStackTrace(System.err);
	                System.err.println("SQLState: " + ((SQLException) e).getSQLState());
	                System.err.println("Error Code: " + ((SQLException) e).getErrorCode());
	                System.err.println("Message: " + e.getMessage());
	                Throwable t = ex.getCause();
	                while (t != null) {
	                    System.out.println("Cause: " + t);
	                    t = t.getCause();
	                }
	            }
	        }
	    }
	    
	    public static int updateVehicule(String oldImm,String imm,String modele,String Kilometrage,String type,String nbPlaces,String Carburant,String DateService,String DateAchat,String DateRevision) throws ClassNotFoundException {
	    	String UPDATE_USERS_SQL = "UPDATE vehicule" +
	            "  SET immatriculation= ?,"+
	        	" modele=?,"+
	            "kilometrage=?,"+
	        	 "type=?,"+
	            "nbreDePlaces=?,"+
	        	 "carburant=?,"+
	            "dateDePremiereMiseEnScene=?,"+
	        	 "dateDachat=?,"+
	            "dateDeProchaineRevision=?"+
	        	 "WHERE immatriculation=?";

	    	String UPDATE_SQL = "UPDATE carburant" +
		            "  SET immVehicule= ?"+
		        	 "WHERE immVehicule=?";
	        int result = 0;

	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try {Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	           PreparedStatement st = connection.prepareStatement(UPDATE_SQL);
	           PreparedStatement preparedStatement = connection.prepareStatement(UPDATE_USERS_SQL);
	          
	            preparedStatement.setString(1, imm);
	            preparedStatement.setString(2, modele);
	            preparedStatement.setString(3, Kilometrage);
	            preparedStatement.setString(4, type);
	            preparedStatement.setString(5, nbPlaces);
	            preparedStatement.setString(6, Carburant);
	            preparedStatement.setString(7, DateService);
	            preparedStatement.setString(8, DateAchat);
	            preparedStatement.setString(9, DateRevision);
	            preparedStatement.setString(10, oldImm);
	            
	            st.setString(1, imm);
	            st.setString(2, oldImm);
	            System.out.println(preparedStatement);
	            st.executeUpdate();
	            // Step 3: Execute the query or update query
	            result = preparedStatement.executeUpdate();
	       

	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
	        return result;
	    }
	 		
	   
	    
	    
	    
	    public static void deleteVehicule(String immatriculation) throws ClassNotFoundException {
	        //String DELETE_USERS_SQL = "DELETE FROM vehicule WHERE" ;
	            
	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try {Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	        
	       // String selectSQL = "DELETE FROM Table WHERE immatriculation = ?";
	        PreparedStatement st = connection.prepareStatement("DELETE FROM vehicule WHERE immatriculation = ?");
	        PreparedStatement stC = connection.prepareStatement("DELETE FROM carburant WHERE immVehicule = ?");
	        st.setString(1,immatriculation);
	        stC.setString(1,immatriculation);
	        st.executeUpdate();
	        stC.executeUpdate();
	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
	        
	    }
	 		
	    public static int registerAppCarb(ApprovisionnementCarburant AppCarb) throws ClassNotFoundException {
	        String INSERT_USERS_SQL = "INSERT INTO carburant" +
	            "  (id,date, quantite, prixUnitaire, montant,immVehicule ) VALUES " +
	            " (default,?, ?, ?, ?,?);";
	        String SelectALLVehicule="SELECT immatriculation FROM vehicule ";

	        int result = 0;

	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try {Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	           PreparedStatement preparedStatement = connection.prepareStatement(INSERT_USERS_SQL);
	        	//preparedStatement.setString(0, vehicule.getImmatriculation());
	        	PreparedStatement st=connection.prepareStatement(SelectALLVehicule);
	        	ResultSet rs= st.executeQuery();
	        	while(rs.next()) 
	        	{
	        		if(rs.getString("immatriculation").equals(String.valueOf(AppCarb.getImmVehicule()))) 
	        		{
	        			preparedStatement.setString(1, AppCarb.getDate());
	    	            preparedStatement.setString(2, String.valueOf(AppCarb.getQuantité()));
	    	            preparedStatement.setString(3, String.valueOf(AppCarb.getPrixUnitaire()));
	    	            preparedStatement.setString(4, String.valueOf(AppCarb.getMontant()));
	    	            preparedStatement.setString(5, String.valueOf(AppCarb.getImmVehicule()));
	    	            preparedStatement.executeUpdate();
	    	            findVehiculeByImm(AppCarb.getImmVehicule());
	        		}
	        	}
	        	
	          
	          
	            System.out.println(preparedStatement);
	            // Step 3: Execute the query or update query
	           
	            

	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
	        return result;
	    }
	 		
	   
	    public static Vehicule findVehiculeByImm(String imm) throws ClassNotFoundException {
	        String SELECT_SQLV = "SELECT * FROM vehicule WHERE immatriculation = ?";
	        Vehicule v = null ;
	        int result = 0;
	       // String SelectALLVehicule="SELECT immatriculation FROM vehicule ";
	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try {Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	           //PreparedStatement st = connection.prepareStatement(SelectALLVehicule);	
	           PreparedStatement preparedStatement = connection.prepareStatement(SELECT_SQLV);
	        	//preparedStatement.setString(0, vehicule.getImmatriculation());
	            preparedStatement.setString(1, imm);
	            System.out.println(preparedStatement);
	            // Step 3: Execute the query or update query
	            //result = preparedStatement.executeUpdate();
	            ResultSet rs= preparedStatement.executeQuery();
	            
	           // ResultSet rs1= st.executeQuery();
	            
	            
	        			 while(rs.next()) 
	     	            {
	     	            v=new Vehicule(rs.getString("immatriculation"),rs.getString("modele"),rs.getString("kilometrage"),rs.getString("type"),rs.getString("nbreDePlaces"),rs.getString("carburant"),rs.getString("dateDePremiereMiseEnScene"),rs.getString("dateDachat"),rs.getString("dateDeProchaineRevision"));
	     	            }
	     	            
	     		        String SELECT_SQLC = "SELECT * FROM carburant WHERE immVehicule = ?";
	     		        PreparedStatement preparedStatement1 = connection.prepareStatement(SELECT_SQLC);
	     		        preparedStatement1.setString(1, imm);
	     		        ResultSet rt= preparedStatement1.executeQuery();
	     		        
	     		        while(rt.next()) 
	     		        {
	     		        ApprovisionnementCarburant c1=new ApprovisionnementCarburant(rt.getString("date"), rt.getDouble("quantite"), rt.getDouble("prixUnitaire"),rt.getString("immVehicule"));
	     		        c1.setId(Integer.parseInt(rt.getString("id")));
	     		        v.addCarburant(c1);
	     		        }
	     		        for(ApprovisionnementCarburant elem: v.getListCarburant())
	     		        {
	     		        	 
	     		        	System.out.println ("Id: "+elem.getId()+" Date: "+((ApprovisionnementCarburant) elem).getDate()+" prix Unitaire: "+elem.getPrixUnitaire()+" Quantite: "+elem.getQuantité()+" Montant: "+elem.getMontant());
	     		        }
	     		        //ret
	        		
	        	
	           

	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
			return v;
	   
	    }
	 		
	  
	    public static Vehicule findVehiculeByImm1(String imm) throws ClassNotFoundException {
	        String SELECT_SQLV = "SELECT * FROM vehicule WHERE immatriculation = ?";
	        Vehicule v = null ;
	        int result = 0;
	       // String SelectALLVehicule="SELECT immatriculation FROM vehicule ";
	        Class.forName("com.mysql.cj.jdbc.Driver");
	        
	        try {Connection connection=DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/vehicule","root","");

	            // Step 2:Create a statement using connection object
	           //PreparedStatement st = connection.prepareStatement(SelectALLVehicule);	
	           PreparedStatement preparedStatement = connection.prepareStatement(SELECT_SQLV);
	        	//preparedStatement.setString(0, vehicule.getImmatriculation());
	            preparedStatement.setString(1, imm);
	            System.out.println(preparedStatement);
	            // Step 3: Execute the query or update query
	            //result = preparedStatement.executeUpdate();
	            ResultSet rs= preparedStatement.executeQuery();
	            
	           // ResultSet rs1= st.executeQuery();
	            
	            
	        			 while(rs.next()) 
	     	            {
	     	            v=new Vehicule(rs.getString("immatriculation"),rs.getString("modele"),rs.getString("kilometrage"),rs.getString("type"),rs.getString("nbreDePlaces"),rs.getString("carburant"),rs.getString("dateDePremiereMiseEnScene"),rs.getString("dateDachat"),rs.getString("dateDeProchaineRevision"));
	     	            }
	     	            
	     		        String SELECT_SQLC = "SELECT * FROM carburant WHERE immVehicule = ?";
	     		        PreparedStatement preparedStatement1 = connection.prepareStatement(SELECT_SQLC);
	     		        preparedStatement1.setString(1, imm);
	     		        ResultSet rt= preparedStatement1.executeQuery();
	     		        
	     		        while(rt.next()) 
	     		        {
	     		        ApprovisionnementCarburant c1=new ApprovisionnementCarburant(rt.getString("date"), rt.getDouble("quantite"), rt.getDouble("prixUnitaire"),rt.getString("immVehicule"));
	     		        c1.setId(Integer.parseInt(rt.getString("id")));
	     		        v.addCarburant(c1);
	     		        }
	     		        for(ApprovisionnementCarburant elem: v.getListCarburant())
	     		        {
	     		        	 
	     		        	System.out.println ("Id: "+elem.getId()+" Date: "+((ApprovisionnementCarburant) elem).getDate()+" prix Unitaire: "+elem.getPrixUnitaire()+" Quantite: "+elem.getQuantité()+" Montant: "+elem.getMontant());
	     		        }
	     		        //ret
	        		
	        	
	           

	        } catch (SQLException e) {
	            // process sql exception
	            printSQLException(e);
	        }
			return v;
	   
	    }
	    
	    
	    
	    
	    
	    
		public static void deleteAppCarb(String id) throws ClassNotFoundException {
			// TODO Auto-generated method stub
			 Class.forName("com.mysql.cj.jdbc.Driver");
		        
		        try {Connection connection=DriverManager.getConnection(
	                    "jdbc:mysql://localhost:3306/vehicule","root","");

		            // Step 2:Create a statement using connection object
		        
		       // String selectSQL = "DELETE FROM Table WHERE immatriculation = ?";
		        PreparedStatement st = connection.prepareStatement("DELETE FROM carburant WHERE id = ?");
		        st.setString(1,id);
		        st.executeUpdate(); 
		        } catch (SQLException e) {
		            // process sql exception
		            printSQLException(e);
		        }
			
		}

		public static int updateAppCarb(String id, String date, String quantite, String prixUnitaire) throws ClassNotFoundException {
			String UPDATE_USERS_SQL = "UPDATE carburant" +
		            "  SET date= ?,"+
		        	" quantite=?,"+
		            "prixUnitaire=?,"+
		        	"montant=?"+
		        	 "WHERE id=?";

		        int result = 0;

		        Class.forName("com.mysql.cj.jdbc.Driver");
		        
		        try (Connection connection=DriverManager.getConnection(
	                    "jdbc:mysql://localhost:3306/vehicule","root","");

		            // Step 2:Create a statement using connection object
		           PreparedStatement preparedStatement = connection.prepareStatement(UPDATE_USERS_SQL)) {
		          
		            preparedStatement.setString(1, date);
		            preparedStatement.setString(2, quantite);
		            preparedStatement.setString(3, prixUnitaire);
		            preparedStatement.setString(4, String.valueOf(ApprovisionnementCarburant.getMontant(quantite, prixUnitaire)));
		            preparedStatement.setString(5, id);
		            
		            System.out.println(preparedStatement);
		            // Step 3: Execute the query or update query
		            result = preparedStatement.executeUpdate();
		       

		        } catch (SQLException e) {
		            // process sql exception
		            printSQLException(e);
		        }
		        return result;
		    }
		 		
		   
			
		
	   
public static void SelectAllVehiculeByIMM() throws ClassNotFoundException {
    
   String SelectALLVehicule="SELECT immatriculation FROM vehicule ";
    Class.forName("com.mysql.cj.jdbc.Driver");
    
    try {Connection connection=DriverManager.getConnection(
            "jdbc:mysql://localhost:3306/vehicule","root","");

        // Step 2:Create a statement using connection object
       //PreparedStatement st = connection.prepareStatement(SelectALLVehicule);	
       PreparedStatement preparedStatement = connection.prepareStatement(SelectALLVehicule);
    	//preparedStatement.setString(0, vehicule.getImmatriculation());
   
        System.out.println(preparedStatement);
        // Step 3: Execute the query or update query
        //result = preparedStatement.executeUpdate();
        ResultSet rs= preparedStatement.executeQuery();
        
  

    } catch (SQLException e) {
        // process sql exception
        printSQLException(e);
    }
	

}
}
