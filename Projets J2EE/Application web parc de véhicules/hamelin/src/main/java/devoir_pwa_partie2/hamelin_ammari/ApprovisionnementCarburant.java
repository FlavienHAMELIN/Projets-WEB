package devoir_pwa_partie2.hamelin_ammari;

public class ApprovisionnementCarburant {
	private int id; // on va le lier avec l'immatriculation
	private String immVehicule;
	private String date;
	private double Quantité; // L ou KWh
	private double prixUnitaire; //prix du lite ou du Kwh
	
	public String getImmVehicule() {
		return immVehicule;
	}
	public void setImmVehicule(String immVehicule) {
		this.immVehicule = immVehicule;
	}
	public String getDate() {
		return date;
	}
	public void setDate(String date) {
		this.date = date;
	}
	public double getQuantité() {
		return Quantité;
	}
	public void setQuantité(double quantité) {
		Quantité = quantité;
	}
	public double getPrixUnitaire() {
		return prixUnitaire;
	}
	public void setPrixUnitaire(double prixUnitaire) {
		this.prixUnitaire = prixUnitaire;
	}
	
	public double getMontant() {
		return Quantité*prixUnitaire;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public ApprovisionnementCarburant(String date, double quantité, double prixUnitaire,String immVehicule ) {
		super();
		this.date = date;
		Quantité = quantité;
		this.prixUnitaire = prixUnitaire;
		this.immVehicule=immVehicule;
	}

	public static double getMontant(String quantite,String prixUnitaire) {
		
		return Double.valueOf(quantite)*Double.valueOf(prixUnitaire);
	}
	
}
