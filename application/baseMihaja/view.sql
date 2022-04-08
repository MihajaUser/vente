/*dose_rquests;
+----+------------+---------+------------+----------+
| id | date       | user_id | vaccine_id | quantity |

 vaccines;
+----+--------------+
| id | nom          |



users;
+----+------------------+----------+---------+-----------+
| id | email            | password | role_id | person_id |

roles;
+----+---------+
| id | nom     |


persons;
+----+-----------------+-----------+---------------+--------------+--------+
| id | firstname       | lastname  | date_of_birth | fokontany_id | cin    |



 drop view viewDemandeVaccin;
*/


CREATE VIEW viewDemandeVaccin AS
SELECT
    dose_rquests.id As  dose_rquestsId,
    dose_rquests.date AS  dose_rquestsDate,
    dose_rquests.quantity As  dose_rquestsQuantity ,
    vaccines.id AS  vaccinesId,
    vaccines.nom AS vaccinesNom,
    users.id AS usersId,
    users.email AS  usersEmail,
    roles.id AS rolesId,
    roles.nom AS rolesNom,
    persons.id AS personsId,
    persons.firstname AS firstname,
    persons.lastname AS lastname,
    fokontanys.id AS fokontanysId,
    fokontanys.nom AS  fokontanysNom
FROM dose_rquests
    INNER JOIN vaccines ON vaccines.id = dose_rquests.vaccine_id
    INNER JOIN users ON  users.id = dose_rquests.user_id
    INNER JOIN roles ON  roles.id = users.role_id
    INNER JOIN persons ON  persons.id = users.person_id
    INNER JOIN fokontanys ON fokontanys.id = persons.fokontany_id
  ;

  /*
  dose_responses
      dos_request_id  
      quantity        
      date

      viewReponseVaccin

  */

  CREATE VIEW viewReponseVaccin AS
SELECT
    dose_rquests.id As  dose_rquestsId,
    dose_rquests.date AS  dose_rquestsDate,
    dose_rquests.quantity As  dose_rquestsQuantity ,
    vaccines.id AS  vaccinesId,
    vaccines.nom AS vaccinesNom,
    users.id AS usersId,
    users.email AS  usersEmail,
    roles.id AS rolesId,
    roles.nom AS rolesNom,
    persons.id AS personsId,
    persons.firstname AS firstname,
    persons.lastname AS lastname,
    fokontanys.id AS fokontanysId,
    fokontanys.nom AS  fokontanysNom,
    dose_responses.quantity AS dose_responsesQuantity,
    dose_responses.date AS  dose_responsesDate
FROM dose_rquests
    INNER JOIN vaccines ON vaccines.id = dose_rquests.vaccine_id
    INNER JOIN users ON  users.id = dose_rquests.user_id
    INNER JOIN roles ON  roles.id = users.role_id
    INNER JOIN persons ON  persons.id = users.person_id
    INNER JOIN fokontanys ON fokontanys.id = persons.fokontany_id
    INNER JOIN dose_responses ON dose_responses.dos_request_id = dose_rquests.id
  ;
  /*
  viewVaccination_histories
ALter table vaccine_rappel add foreign key (vaccination_histories_id) REFERENCES(id)vaccination_histories;
 persons
    vaccine
  */

CREATE VIEW viewVaccineHistories AS
SELECT
      persons.id AS personsId,
      persons.firstname AS firstname,
      persons.lastname AS lastname,
      persons.date_of_birth AS  personsDate_of_birth,
      persons.cin AS personsCin,
      fokontanys.id AS fokontanysId,
      fokontanys.nom AS  fokontanysNom,
      vaccines.id As vaccineId,
      vaccines.nom AS vaccineNom,
      vaccination_histories.date AS vaccination_historiesDate,
      vaccine_rappel.date AS vaccine_rappelDate
FROM vaccine_rappel
  INNER JOIN vaccination_histories ON vaccination_histories.id = vaccine_rappel.vaccination_histories_id
  INNER JOIN persons ON vaccination_histories.person_id = persons.id
  INNER JOIN fokontanys ON persons.fokontany_id = fokontanys.id
  INNER JOIN vaccines ON vaccines.id = vaccination_histories.vaccine_id
 ;
  
  CREATE VIEW viewVaccinePresence AS
  SELECT
        persons.id AS personsId,
        persons.firstname AS firstname,
        persons.lastname AS lastname,
        persons.date_of_birth AS  personsDate_of_birth,
        persons.cin AS personsCin,
        fokontanys.id AS fokontanysId,
        fokontanys.nom AS  fokontanysNom,
        (select count(*) from vaccination_histories where person_id=personsId ) As presence
  FROM persons
    INNER JOIN fokontanys ON persons.fokontany_id = fokontanys.id
  ;
