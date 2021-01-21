<?php
include_once("../../Pandora_nav_footer/nav.php");
include_once("../../Pandora_nav_footer/footer.php");

function head()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../view/billeterie/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <title>Billeterie - Pandora's Journey</title>
    </head>
<?php
}

function etapes()
{ ?>

    <body>
        <!-- ----------------------------------  Corps  --------------------------------->
        <div class="container infoVol">
            <div class="row">
                <div>
                    <h1 class="col-12 h1Section">Départs, vols et vie sur Pandora</h1>
                </div>
                <div>
                    <p class="col-12 sousTexte text-center">Tout savoir avant de partir !</p>
                </div>
            </div>

            <div class="row section1">
                <div>
                    <p class=" para1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, iste quis dolore nulla, labore dolor ab vitae optio natus ipsum blanditiis placeat expedita nam minima nostrum, recusandae quasi nesciunt unde.
                        Explicabo cum debitis reiciendis !<br>
                        <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, nam. Ratione fugit, qui perspiciatis numquam nostrum ea pariatur tempore repellat corporis dignissimos magnam? Ad, deleniti ipsa laudantium ipsum non vel.Numquam delectus earum impedit officia facere unde laborum laudantium dignissimos ipsum quaerat.
                    </p>
                </div>
            </div>
        </div>
        <div class="container Preparer">
            <div class="section-icon-container mx-auto mb-3">
                <div class="row justify-content-center">
                    <img src="../images/prepare.svg" class=" col-12 iconPrepare">
                    <h3 class="titreEtapes">Se Préparer</h3>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="container Etapes">
                <div class="row col-lg-12 col-md-12 align-items-center rowEtapes">
                    <div class="preparation">
                        <div class="col">
                            <img src="../images/map.svg">
                            <h4>Comment s'y rendre ?</h4>
                            <p>Les Départs se font dans la capital de votre pays</p>
                            <p>Les horaires dépendent de votre pays</p>
                        </div>

                        <div class="col">
                            <img src="../images/bagage.svg">
                            <h4>Assurance Voyage</h4>
                            <p>Pensez à prendre une assurance en cas d'annulation</p>
                            <p>Une assurance bagage peut aussi être envisagée !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container Preparer">
            <div class="section-icon-container mx-auto mb-3">
                <div class="row justify-content-center">
                    <img src="../images/planet.svg" class=" col-12 iconPrepare">
                    <h3 class="titreEtapes">Sur place</h3>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="container Etapes">
                <div class="row col-lg-12 col-md-12 align-items-center rowEtapes">
                    <div class="preparation">
                        <div class="col">
                            <img src="../images/languages.svg">
                            <h4>Langue offcielle</h4>
                            <p>La langue la plus parlé sur Pandora est l'anglais</p>
                            <p>Vous pouvez trouver des associations d'entre-aide parlant votre langue</p>
                        </div>

                        <div class="col">
                            <img src="../images/sun.svg">
                            <h4>La météo sur Pandora</h4>
                            <p>Le climat est tropical, équivalent à des température Sud-Américaine</p>
                            <p>De part son climat tropical, les saisons des pluies sont à prévoir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

function complementaire()
{ ?>
        <div class="container complementaire">
            <div class="textComplementaire">
                <h2>Informations complémentaire ?</h2>
                <p>Pour acheter un billet il faut vous connecter.<br>Vous avez des questions ou besoin de plus d'infos ? rendez-vous sur le forum, c'est <a href="../forum/forumcontrolleur.php">juste ici.</a><br>Envie de passer le pas et réserver votre vol ? c'est en dessous que ça ce passe !</p>
            </div>
        </div>
    <?php
}

function formulaireVol()
{ ?>
        <!-- Formulaire pour trouver un vol -->
        <div class="container">
            <form action="billeterieController.php?action=ajout" method="post">
                <div class="row">
                    <div class="formulaire col-12 col-md-6">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" class="form-control" name="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="formulaire col-12 col-md-6">
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Entrez votre prénom">
                    </div>
                </div>
            <?php
        }

        function select()
        { ?>
                <div class="row">
                    <div class="formulaire col-12 col-md-6 ">
                        <label for="depart" id="depart">Pays de départ:</label>
                        <select name="pays" class="form-select form-select-lg mb-3">
                            <option value="France" selected="selected">France </option>

                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>

                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>

                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>

                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>

                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>

                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>

                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>

                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>

                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>

                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>

                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>

                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>

                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie">Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>

                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>

                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>

                            <option value="Qatar">Qatar </option>

                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>

                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>

                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>

                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>

                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>

                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>

                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>
                        </select>
                    </div>
                <?php
            }

            function suiteFormulaireVol()
            { ?>
                    <div class="formulaire col-12 col-md-6">
                        <label for="date">Date de départ:</label>
                        <input type="date" class="form-control" id="date" name="date" min="2021-01-18" max="2022-01-18">
                    </div>
                </div>
                <div class="row">
                    <div class="formulaire col-12">
                        <label for="passager">Nombre de passagers</label>
                        <input type="number" class="form-control" id="passager" name="passager" min="1" placeholder="Entrez le nombre de passagers">
                    </div>
                </div>
                <div class="btnValide">
                    <input type="submit" value="Valide" class="valide">
                </div>
            </form>
        </div>

    </body>
    <script src="app.js" type="text/javascript"></script>

    </html>
<?php
            }

            function billetValidation()
            { ?>
    <div class="billetValidation">
        <div class="alert alert-success " role="alert">
            Billet réservé ! un mail de confirmation a été envoyer sur votre boîte mail.
        </div>
    </div>
<?php
            }
