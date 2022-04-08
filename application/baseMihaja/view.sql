
 
 CREATE VIEW viewDevis AS
SELECT
      clients.id As  clientsId,
      clients.nom AS  clientsNom,
      clients.adresse As  clientsAdresse ,
      clients.contact AS  clientsContact,
      devis.id AS  devisId ,
      devis.date AS  devisDate ,
      devis.status AS   devisStatus
FROM clients
    INNER JOIN devis ON devis.idClient = clients.id
  ;

 
 CREATE VIEW viewFicheDevis AS
SELECT
      clients.id As  clientsId,
      clients.nom AS  clientsNom,
      clients.adresse As  clientsAdresse ,
      clients.contact AS  clientsContact,
      devis.id AS  devisId ,
      devis.date AS  devisDate ,
      devis.status AS   devisStatus,
      detailDevis.produit AS detailDevisProduit ,
      detailDevis.quantite AS  detailDevisQuantite
FROM clients
    INNER JOIN devis ON devis.idClient = clients.id
    INNER JOIN detailDevis ON devis.id = detailDevis.idDevis;
  ;


  CREATE VIEW viewProformat AS 
  SELECT
      clients.id As  clientsId,
      clients.nom AS  clientsNom,
      clients.adresse As  clientsAdresse ,
      clients.contact AS  clientsContact,
      devis.id AS  devisId ,
      devis.date AS  devisDate ,
      devis.status AS   devisStatus,
      proformats.id  AS   proformatsId,
      proformats.idDevis AS   proformatsIdDevis,
      proformats.dateDeCreation AS  proformatsDateDeCreation  
FROM clients
    INNER JOIN devis ON devis.idClient = clients.id
     INNER JOIN proformats ON devis.id = proformats.idDevis
  ;
----------------------------


-----------------------------------------------
  CREATE VIEW viewFicheProformat AS 
  SELECT
      clients.id As  clientsId,
      clients.nom AS  clientsNom,
      devis.id AS  devisId ,
      devis.date AS  devisDate ,
      proformats.id  AS   proformatsId,
      proformats.idDevis AS   proformatsIdDevis,
      proformats.dateDeCreation AS  proformatsDateDeCreation,
      detailProformats.quantite AS quantite,
       detailProformats.prixUnitaire AS prixUnitaire,
       produits.nom AS produitsNom
FROM clients
      INNER JOIN devis ON devis.idClient = clients.id
      INNER JOIN proformats ON devis.id = proformats.idDevis
      INNER JOIN detailProformats ON   detailProformats.idProformat =proformats.id
      INNER JOIN produits ON produits.id = detailProformats.idProduits
  ;


