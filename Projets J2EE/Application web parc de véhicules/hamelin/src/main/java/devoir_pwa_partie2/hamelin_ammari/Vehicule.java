package devoir_pwa_partie2.hamelin_ammari;

import java.util.ArrayList;

public class Vehicule {
	private String id;
	private String immatriculation;
	private String modele;
	private String kilometrage;
	private String Type;
	private String nombreDePlaces;
	private String carburant;
	private String dateDePremiereMiseEnScene;
	private String DateDachat;
	private String DateDeProchaineRevision;
	private ArrayList<ApprovisionnementCarburant> listCarburant;
	
	
	public Vehicule(String immatriculation, String modele, String kilometrage, String type, String nombreDePlaces,
			String carburant, String dateDePremiereMiseEnScene, String dateDachat, String dateDeProchaineRevision) {
		super();
		//this.id=id;
		this.immatriculation = immatriculation;
		this.modele = modele;
		this.kilometrage = kilometrage;
		this.Type = type;
		this.nombreDePlaces = nombreDePlaces;
		this.carburant = carburant;
		this.dateDePremiereMiseEnScene = dateDePremiereMiseEnScene;
		this.DateDachat = dateDachat;
		this.DateDeProchaineRevision = dateDeProchaineRevision;
		this.listCarburant=new ArrayList<ApprovisionnementCarburant>();
	}
	public String getImmatriculation() {
		return immatriculation;
	}
	public void setImmatriculation(String immatriculation) {
		this.immatriculation = immatriculation;
	}
	public String getModele() {
		return modele;
	}
	public void setModele(String modele) {
		this.modele = modele;
	}
	public String getKilometrage() {
		return kilometrage;
	}
	public void setKilometrage(String kilometrage) {
		this.kilometrage = kilometrage;
	}
	public String getType() {
		return Type;
	}
	public void setType(String type) {
		this.Type = type;
	}
	public String getNombreDePlaces() {
		return nombreDePlaces;
	}
	public void setNombreDePlaces(String nombreDePlaces) {
		this.nombreDePlaces = nombreDePlaces;
	}
	public String getCarburant() {
		return carburant;
	}
	public void setCarburant(String carburant) {
		this.carburant = carburant;
	}
	public String getDateDePremiereMiseEnScene() {
		return dateDePremiereMiseEnScene;
	}
	public void setDateDePremiereMiseEnScene(String dateDePremiereMiseEnScene) {
		this.dateDePremiereMiseEnScene = dateDePremiereMiseEnScene;
	}
	public String getDateDachat() {
		return DateDachat;
	}
	public void setDateDachat(String dateDachat) {
		this.DateDachat = dateDachat;
	}
	public String getDateDeProchaineRevision() {
		return DateDeProchaineRevision;
	}
	public void setDateDeProchaineRevision(String dateDeProchaineRevision) {
		this.DateDeProchaineRevision = dateDeProchaineRevision;
	}
	public ArrayList<ApprovisionnementCarburant> getListCarburant() {
		return listCarburant;
	}
	public void setListCarburant(ArrayList<ApprovisionnementCarburant> listCarburant) {
		this.listCarburant = listCarburant;
	}
	public String getId() {
		return id;
	}
	public void setId(String id) {
		this.id = id;
	}
	public void addCarburant(ApprovisionnementCarburant approvisionnementCarburant) {
		// TODO Auto-generated method stub
		listCarburant.add(approvisionnementCarburant);
		
	}
	

}
