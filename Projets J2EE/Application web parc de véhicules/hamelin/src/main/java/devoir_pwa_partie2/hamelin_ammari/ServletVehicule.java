package devoir_pwa_partie2.hamelin_ammari;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

/**
 * Servlet implementation class ServletVehicule
 */
public class ServletVehicule extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ServletVehicule() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		
	}
	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		//insertion dans la table véhicule
		if(request.getParameter("Immatriculation")!=null && request.getParameter("Modele")!=null && request.getParameter("Kilometrage")!=null && request.getParameter("p")!=null && request.getParameter("NbreDePlaces")!=null && request.getParameter("carburant")!=null && request.getParameter("DateDePremiereMiseEnService")!=null && request.getParameter("DateDachat")!=null && request.getParameter("DateDeProchaineRevision")!=null&&request.getParameter("boutonCreation")!=null) 
		{
			Vehicule v=new Vehicule(request.getParameter("Immatriculation"), request.getParameter("Modele"),request.getParameter("Kilometrage"),request.getParameter("p"),request.getParameter("NbreDePlaces"),request.getParameter("carburant"),request.getParameter("DateDePremiereMiseEnService"),request.getParameter("DateDachat"),request.getParameter("DateDeProchaineRevision"));
			try {
				GestionBd.registerVehicule(v);
				 request.getRequestDispatcher("index.jsp").forward(request, response);
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		if(request.getParameter("boutonLister")!=null) 
		{
			 //response.sendRedirect("Affichage.jsp");
			 request.getRequestDispatcher("Affichage.jsp").forward(request, response);
	
		}
		
		if(request.getParameter("supprimer")!=null) 
		{
		request.getRequestDispatcher("SupprimerUnVehicule.jsp").forward(request, response);
	
		}
		
		if(request.getParameter("update")!=null) 
		{
		request.getRequestDispatcher("UpdateVehicule.jsp").forward(request, response);
	
		}
		
		//suppression du véhicule d'immatriculation : ImmatriculationSuppr
		if(request.getParameter("ImmatriculationSuppr")!=null) 
		{
			try {
				GestionBd.deleteVehicule(request.getParameter("ImmatriculationSuppr"));
				request.getRequestDispatcher("Affichage.jsp").forward(request, response);
				
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		
	
		}
		
		
		//suppression de l'approvisionnement d'immatriculation : ImmSupp
		if(request.getParameter("IdSupp")!=null) 
		{
			try {
				GestionBd.deleteAppCarb(request.getParameter("IdSupp"));
				request.getRequestDispatcher("Affichage.jsp").forward(request, response);
				
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		
	
		}
		
		
		//de UpdateVehiculeA à SupprimerCarburant
		if(request.getParameter("SupprBtnAppCarb")!=null) 
		{
			request.getRequestDispatcher("SupprimerCarburant.jsp").forward(request, response);
		}
		
		
		
		//redirection de UpdateVehicule à UpdateVehiculeA
		if(request.getParameter("ImmatriculationUpdate")!=null) 
		{
			String SelectALLVehicule="SELECT immatriculation FROM vehicule ";
		    try {
				Class.forName("com.mysql.cj.jdbc.Driver");
			} catch (ClassNotFoundException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		    
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
		        while(rs.next()) 
		        {
		        	if(rs.getString("immatriculation").equals(request.getParameter("ImmatriculationUpdate")))
					{
		        		request.getRequestDispatcher("UpdateVehiculeA.jsp").forward(request, response);
					}
		        }
        		request.getRequestDispatcher("Affichage.jsp").forward(request, response);

		    } catch (SQLException e) {
		        // process sql exception
		        e.printStackTrace();
		    }
		    
		    
		}
		
		//Update les données d'un véhicule
		if(request.getParameter("updateVehicule")!=null) {
			String imm=request.getParameter("Imm");
			String modele=request.getParameter("mod");
			String Kilometrage=request.getParameter("km");
			String type=request.getParameter("type");
			String nbPlaces=request.getParameter("NbPlaces");
			String Carburant=request.getParameter("carb");
			String DateService=request.getParameter("DateService");
			String DateAchat=request.getParameter("DateAchat");
			String DateRevision=request.getParameter("DateRevision");
			String oldImm=request.getParameter("oldImm");
			if(imm!=null && modele!=null && Kilometrage!=null && type!=null && nbPlaces!=null && Carburant!=null && DateService!=null && DateAchat!=null && DateRevision!=null&&request.getParameter("updateVehicule")!=null) 
			{
				 try{
					 GestionBd.updateVehicule(oldImm,imm, modele, Kilometrage, type, nbPlaces, Carburant, DateService, DateAchat, DateRevision);
					 //System.out.println("before");
					//response.sendRedirect("Affichage.jsp");
					 request.getRequestDispatcher("Affichage.jsp").forward(request, response);
					 //System.out.println("after");
				 }
				 catch(Exception e){
			          e.printStackTrace();
			        }
				 request.getRequestDispatcher("Affichage.jsp").forward(request, response);
			
			}
			
		}
		//redirection de UpdateVehiculeA à servlet puis de servlet à Affichage
		if(request.getParameter("boutonLister1")!=null) 
		{
		request.getRequestDispatcher("Affichage.jsp").forward(request, response);
	
		}
		
		//De affichage à index
		if(request.getParameter("createNewVehicule")!=null) 
		{
		request.getRequestDispatcher("index.jsp").forward(request, response);
	
		}
		//de index à FormulaireAppCarburant
		if(request.getParameter("boutonAppCarburant")!=null) 
		{
		request.getRequestDispatcher("FormulaireAppCarburant.jsp").forward(request, response);
	
		}
		//de UpdateVehiculeA à FormulaireAppCarburant
		if(request.getParameter("AjouterBtnAppCarb")!=null) 
		{
		request.getRequestDispatcher("FormulaireAppCarburant.jsp").forward(request, response);
	
		}
		
		//de updateCarburant à UpdateCarburantA
		if(request.getParameter("idAppCarburant")!=null) 
		{
			
			request.getRequestDispatcher("UpdateCarburantA.jsp").forward(request, response);

		}
		
		//de updateVehiculeA à UpdateCarburant
		if(request.getParameter("UpdateBtnAppCarb")!=null) 
		{
			request.getRequestDispatcher("UpdateCarburant.jsp").forward(request, response);

		}
		
		//FormulaireAppCarburant à Affichage
		if(request.getParameter("ListerAppCarbVe")!=null) 
		{
			request.getRequestDispatcher("Affichage.jsp").forward(request, response);

		}
		
		
		//De updateCarburantA: apres avoir fait l'update on part vers l'affichage
		
		if(request.getParameter("updatecarb")!=null) {
			
			String date=request.getParameter("dateC");
			String quantite=request.getParameter("quantiteC");
			String prixUnitaire=request.getParameter("prixC");
			String id=request.getParameter("idC");
			
			if( quantite!=null && prixUnitaire!=null) 
			{
				 try{
					 GestionBd.updateAppCarb(id,date, quantite, prixUnitaire);
					 //System.out.println("before");
					//response.sendRedirect("Affichage.jsp");
					 request.getRequestDispatcher("Affichage.jsp").forward(request, response);
					 //System.out.println("after");
				 }
				 catch(Exception e){
			          e.printStackTrace();
			        }
						
			}
			
		}
		
		
		//Ajout d'un carburant
		if(request.getParameter("AppCarbVehicule")!=null&&request.getParameter("dateAppCarb")!=null && request.getParameter("Quantite")!=null &&request.getParameter("prixUnitaire")!=null &&request.getParameter("boutonAppCarb")!=null)
		{
			
			ApprovisionnementCarburant AppCarb=new ApprovisionnementCarburant(request.getParameter("dateAppCarb"), Double.valueOf(request.getParameter("Quantite")), Double.valueOf(request.getParameter("prixUnitaire")),request.getParameter("AppCarbVehicule"));	
			try {
				GestionBd.registerAppCarb(AppCarb);
				//GestionBd.findVehiculeByImm(request.getParameter("AppCarbVehicule"));
				request.getRequestDispatcher("FormulaireAppCarburant.jsp").forward(request, response);
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			
			
		}
		
		
		
	}

}
