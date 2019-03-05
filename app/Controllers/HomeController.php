<?php

namespace App\Controllers;

/**
 * Gestion de la page d'accueil
 */
class HomeController extends Controller
{
    /**
     * Listing des articles
     */
    public function index():void
    {
        $this->view('specific-page/home', [
            'baliseTitle' => 'Homepage title',
            'metaDescription' => 'Homepage desciption',
        ]);  
    }
}
