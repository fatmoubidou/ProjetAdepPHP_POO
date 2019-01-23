<?php

//Function qui retourne un tableau contenant les routes de notre application

//Modèle des routes
//"NomDeLaRoute" => [
//  "Controller",
//  "Fonction",
//  Optionnel [
//    "parametre1" => ["typeAttendu", optionnel[valeurAttendu]],
//    "parametre2" => ["typeAttendu", optionnel[valeurAttendu]]
//  ]
// "status" => "role"
//]
function getRoutes() {
  return [
    "" => [
      "index",
      "connect"
    ],
    "login" => [
      "index",
      "connect"
    ],
    "logout" => [
      "index",
      "deconnect"
    ],
    // "login" => [
    //   "admin",
    //   "loginUser",
    // ],
    // START MATERIEL ROUTES
    "materiels" => [
     "materiel",
     "listMateriel",
     "status" => "admin"
   ],
    "materiels/ajout" => [
     "materiel",
     "add",
     "status" => "admin"
   ],
    "materiels/edit" => [
     "materiel",
     "edit",
     ["id" => ["integer"]
   ],
     "status" => "admin"
   ],
    "materiels/suppr" => [
     "materiel",
     "delete",
     ["id" => ["integer"]
     ],
     "status" => "admin"
    ],

    // END MATERIEL ROUTES
    //start roads for borrow
   "emprunter/list" => [
     "emprunt",
     "allMateriels",
     "status" => "user"
   ],

   "emprunter" => [
      "emprunt",
      "emprunter",
      ["id" => ["integer"]
    ],
      "status" => "user"
    ],

    "restituer/list" => [
      "emprunt",
      "allEmprunts",
      "status" => "admin"
    ],

    "emprunts/restituer" => [
      "emprunt",
      "restituer",
      ['id' => ['integer']
    ],
      "status" => "admin"
],
    "emprunts/list" => [
      "emprunt",
      "myEmprunts",
      "status" => "user"

    ]
// end roads for borrow
  ];
}

 ?>
