package com.sample;


public class Produits {

  private long idProduit;
  private String designation;
  private double prix;
  private long qteStockee;
  private String photo;


  public long getIdProduit() {
    return idProduit;
  }

  public void setIdProduit(long idProduit) {
    this.idProduit = idProduit;
  }


  public String getDesignation() {
    return designation;
  }

  public void setDesignation(String designation) {
    this.designation = designation;
  }


  public double getPrix() {
    return prix;
  }

  public void setPrix(double prix) {
    this.prix = prix;
  }


  public long getQteStockee() {
    return qteStockee;
  }

  public void setQteStockee(long qteStockee) {
    this.qteStockee = qteStockee;
  }


  public String getPhoto() {
    return photo;
  }

  public void setPhoto(String photo) {
    this.photo = photo;
  }

}
