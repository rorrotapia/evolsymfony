<?php

namespace App\Service\Form;


interface FormInterface
{
    //
    public function isSubmit() : bool;

    // ... ca recupere tous les arguments dans un tableau
    public function setData(...$fields) : void;

    // Validation et ajout de messages d'erreurs
    public function validate() : void;

    // Le formulaire est-il valide
    public function isValid() : bool;

    // recuperer les champs du formulaire pour les utiliser dans les class de requetes ou pour stocker les info lorsque on ne valide pas le formulaire du premier coup
    public function getData() : array;

}