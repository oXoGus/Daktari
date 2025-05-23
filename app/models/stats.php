<?php 
//Les trois vues des requêtes
//Vue numéro 1 : Les meilleurs clients 
//On prend la somme des dépenses de chaque client et on affiche dans le sens décroissant
$bestClient ="SELECT responsable.nom,ROUND(SUM(COALESCE(manipulation.tarif, 0)/100) + SUM(traiter.tarif_standard), 2) as total
FROM responsable JOIN animaux ON responsable.id = animaux.id
JOIN traiter ON animaux.id = traiter.animal_id
JOIN consultation ON traiter.consultation_id = consultation.id
left JOIN manip_consult ON consultation.id = manip_consult.consultation_id
left JOIN manipulation ON manip_consult.code = manipulation.code
GROUP BY responsable.id
ORDER BY SUM(COALESCE(manipulation.tarif, 0)/100) + SUM(traiter.tarif_standard) DESC;";

$reqB = $cnx -> prepare($bestClient);
$reqB -> execute();

//Vue numéro 2 : Les manipulations du mois dernier 
$manipMonth = "select r.nom as client, a.nom as animal, mc.code from animaux a, responsable r, traiter t, manip_consult mc where t.consultation_id=mc.consultation_id and a.id_responsable=r.id and t.animal_id=a.id and date_consult >=DATE_TRUNC('month', CURRENT_DATE - INTERVAL '1 month') AND date_consult <= DATE_TRUNC('month', CURRENT_DATE)";

$reqM = $cnx -> prepare($manipMonth);
$reqM -> execute();
//Vue numéro 3 : 50% d'augmentation du tarif standard des types de consultations depuis 2020 de plus de 50%
//On crée consults, qui contient les types de consult et leur nombre, parce que si ==1, alors plus loin on ignorera
//table premsConsult pour obtenir les premières consults de chaque type, on utilise Distinct afin d'éviter les doublons de ligne',
//table dernierConsult qui prend la dernière consult de chaque type, en évitant les doublons
//Enfin la view affiche pour chaque type de consul (soin et loc), le premier et dernier tarif standard, donc pas de consultations à tarids exceptionnels, ainsi que le taux d'augmentation et n'affiche que celles de plus de 50% d'augmentation

//"CREATE VIEW tarif_augment AS WITH
//consults AS (select type_soin, type_localisation, COUNT(*) as nb_consult from traiter t join consultation c on consultation_id = id where date_consult >= '2020-01-01' and raison_tarif_exceptionnel='Aucune' GROUP BY type_soin,type_localisation ),
//premsConsult AS (select DISTINCT ON (type_soin, type_localisation) type_soin, type_localisation, tarif_standard as tarif2020 from traiter join consultation on consultation_id = id where date_consult BETWEEN '2020-01-01' and '2020-12-31' and raison_tarif_exceptionnel = 'Aucune' ORDER BY type_soin, type_localisation, date_consult ASC),
//dernierConsult AS (select DISTINCT ON (type_soin, type_localisation) type_soin, type_localisation, tarif_standard as tarifRecent from traiter join consultation on consultation_id = id where date_consult >= '2020-01-01' and raison_tarif_exceptionnel = 'Aucune' ORDER BY type_soin, type_localisation, date_consult DESC)
//select pc.type_soin,pc.type_localisation, tarif2020, tarifRecent,(tarifRecent - tarif2020) / tarif2020 as augmentation from premsConsult pc join dernierConsult dc on pc.type_soin = dc.type_soin and pc.type_localisation = dc.type_localisation join consults c on pc.type_soin = c.type_soin and pc.type_localisation = c.type_localisation where c.nb_consult >= 2 and (dc.tarifRecent - pc.tarif2020) / pc.tarif2020 >= 0.5" ;


$augm ="select * from tarif_augment";

  $reqA=$cnx-> prepare($augm);
  try{
    $reqA -> execute();
  } catch(Exception $e){
    echo "".$e -> getMessage()."";
  }

?>