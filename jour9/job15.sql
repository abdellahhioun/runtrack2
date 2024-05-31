SELECT salles.nom AS nom_salle, etages.nom AS nom_etage
FROM salles
JOIN etages ON salles.etage_id = etages.id;
