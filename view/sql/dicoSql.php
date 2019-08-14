<?php
include '../header.php';
?>
<div class="uk-container">
    <h1>Le dictionnaire de données</h1>
    <ul uk-accordion>
        <li class="uk-open">
            <a class="uk-accordion-title" href="#">Introduction</a>
            <div class="uk-accordion-content">
                <p>
                    Avant de construire notre base de données, il est nécessaire d'établir un dictionnaire des données. Ceci permettra de référencer et de typer toutes les données nécessaires à notre site.
                </p>
                <p>
                    Pour le premier exercice, nous devons établir un dictionnaire de données contenant toutes les informations d'une région pour la gestion de ses plages :
                </p>
                <ul>
                    <li>Dans un premier temps, elle souhaite connaître toutes ses plages</li>
                    <ul>
                        <li>chaque plage appartient à une ville</li>
                        <li>pour une plage, on connaîtra : sa longueur en km, a nature du terrain : sable fin, rochers, galets, ... sachant qu'il peut y avoir des plages avec sable et rochers</li>
                    </ul>
                    <li>Le suivi se fera par département (uniquement les départements de la région). </li>
                    <li>Un responsable région sera nommé : on en connaitra son nom et son prénom.</li>

                    <li>Une ville est identifiée par son code postal et le nombre de touristes annuel qu'elle reçoit, doit être connu. </li>
                </ul>
                <p>
                    Pour le second exercice, nous allons recenser les informations nécessairesà la réalisation d'un système de gestion d'inscription destagiaires à des actions deformations. Dans un premier temps, nous souhaitons connaitre les stagiaires:
                </p>
                <ul>
                    <li>Chaque stagiaire possède un numéro d'inscription.</li>
                    <li>Il est identifié pas son état civil (nom, prénom, ...).</li>
                </ul>
                <ul>
                    <li>On souhaite conserver l'historique du suivi des formations.</li>
                    <li> Les formations sont identifiées par un numéro national et un intitulé.</li>
                    <li>Une formation peut viser l'obtention d'un titre professionnel dont on doit spécifier le niveau.</li>
                    <li> La durée d'une formation est la même pour tousles stagiaires, la date de fin dépendant de la date de début</li>
                </ul>
            </div>
            <hr class="uk-divider-icon"/>
        </li>
        <li>
            <a class="uk-accordion-title" href="#">Correction exercice 1</a>
            <div class="uk-accordion-content">
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-striped uk-table-middle">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Libellé</th>
                                <th>Type</th>
                                <th>Contrainte</th>
                                <th>Règle de calcul</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cityName</td>
                                <td>Nom de la ville</td>
                                <td>Chaîne (50)</td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>postalCode</td>
                                <td>Code postal</td>
                                <td>Entier (5)</td>
                                <td>Taille = 5</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>touristsNumber</td>
                                <td>Nombre de touriste à l'année</td>
                                <td>Entier (8)</td>
                                <td> >= 0</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>length</td>
                                <td>Longueur de la plage</td>
                                <td>Entier (5)</td>
                                <td> >= 0</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>ground</td>
                                <td>Nature du terrain</td>
                                <td>Chaîne (50)</td>
                                <td>Sable, galet, rocher, falaise, ...</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>deptNumber</td>
                                <td>Numéro du département</td>
                                <td>Entier (2 - 3)</td>
                                <td>>0 <= 95; >=971 <=975</td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>deptName</td>
                                <td>Nom du département</td>
                                <td>Chaîne (100)</td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>managerLastname</td>
                                <td>Nom de famille du responsable de région</td>
                                <td>Chaîne (50)</td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                            <tr>
                                <td>managerFirstname</td>
                                <td>Prénom du responsable de région</td>
                                <td>Chaîne (50)</td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            <hr class="uk-divider-icon"/>
        </li>  
        <li>
            <a class="uk-accordion-title" href="#">Correction exercice 2</a>
            <div class="uk-accordion-content">
                <table class="uk-table uk-table-striped uk-table-middle">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Libellé</th>
                            <th>Type</th>
                            <th>Observation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sta_id</td>
                            <td>Numéro du stagiaire</td>
                            <td>Entier (10)</td>
                            <td> >0 unique</td>
                        </tr>
                        <tr>
                            <td>sta_lastname</td>
                            <td>Nom de famille du stagiaire</td>
                            <td>Chaîne (50)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>sta_firstname</td>
                            <td>Prénom du stagiaire</td>
                            <td>Chaîne (50)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>sta_sex</td>
                            <td>Genre</td>
                            <td>Chaîne (1)</td>
                            <td>H/F</td>
                        </tr>
                        <tr>
                            <td>sta_address</td>
                            <td>Adresse du stagiaire</td>
                            <td>Chaîne (50)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>sta_city</td>
                            <td>Ville</td>
                            <td>Chaîne (50)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>sta_postalCode</td>
                            <td>Code Postal</td>
                            <td>Entier (5)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>sta_birthdate</td>
                            <td>Date de naissance du stagiaire</td>
                            <td>Date</td>
                            <td>jj/mm/aaaa</td>
                        </tr>
                        <tr>
                            <td>for_id</td>
                            <td>Numéro de formation</td>
                            <td>Entier (10)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>for_name</td>
                            <td>Intitulé de formation</td>
                            <td>Chaîne (50)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>for_level</td>
                            <td>Niveau de la formation</td>
                            <td>Entier (1)</td>
                            <td> - </td>
                        </tr>
                        <tr>
                            <td>for_degree</td>
                            <td>Formation qualifiante</td>
                            <td>Booléen</td>
                            <td>O/N</td>
                        </tr>
                        <tr>
                            <td>for_duration</td>
                            <td>Durée de la formation</td>
                            <td>Entier</td>
                            <td>Jours</td>
                        </tr>
                        <tr>
                            <td>for_start</td>
                            <td>Date de début de la formation</td>
                            <td>Date</td>
                            <td>jj/mm/aaaa</td>
                        </tr>
                        <tr>
                            <td>for_end</td>
                            <td>Date de fin de la formation</td>
                            <td>Date</td>
                            <td>jj/mm/aaaa</td>
                        </tr
                    </tbody>
                </table>

            </div>
            <hr class="uk-divider-icon"/>
        </li> 
    </ul>
</div>

<?php
include '../footer.php';
?>