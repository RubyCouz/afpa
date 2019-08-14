<?php

// application/controllers/Produits.php	
//instruction de sécurité empéchant l'accès direct au fichier
defined('BASEPATH') OR exit('No direct script access allowed');

// création de la classe Produits héritant des propriétés de la classe CI_Controller (important : nom de la classe avec première lettre en majuscule, tout comme le fichier)
class ExoController extends CI_Controller {

    /**
     * exo 1
     */
    public function firstExo()
    {
        $this->load->helper('url');
        // Déclaration du tableau associatif à transmettre à la vue	
        $array = array();
//        // Dans le tableau, on créé une donnée 'firstname' qui a pour valeur 'Dave'    
        $array['firstname'] = 'Dave';
//        // Dans le tableau, on créé une donnée 'lastname' qui a pour valeur 'Grohl'    
        $array['lastname'] = 'Grohl';

// chargement des vues
        $this->load->view('header');
        $this->load->view('exo', $array);
        $this->load->view('footer');
    }

    public function secondExo()
    {
        // chargement du helper url, pour la redirection et le chargement des vues
        $this->load->helper('url');
        // céclaration d'un tableau 'ref'
        $ref = ['Aramis', 'Athos', 'Clatronic', 'Camping', 'Green'];
        //déclaration d'un tableau 'array'
        $array = array();
        // stockage du tableau 'ref' dans le tableau 'array'
        $array['refName'] = $ref;
        // chargement des vues
        $this->load->view('header');
        $this->load->view('exo2', $array);
        $this->load->view('footer');
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

