<?php

namespace App\Controllers;

use Core\Routing\Router;
use Core\Controller\BaseController as Controller;
/**
 * Gestion des erreurs
 */
class ErrorController extends Controller
{
    /**
     * Erreur HTTP 404
     */
    public function _404()
    {
        $this->header(substr(__METHOD__, -3));
        $this->view('error/404', [
            'baliseTitle' => 'Error 404 title',
            'metaDescription' => 'Error 404 desciption',
        ]);
    }

    public function _403()
    {
        $this->header(substr(__METHOD__, -3));
        $this->view('error/403', [
            'baliseTitle' => 'Error 403 title',
            'metaDescription' => 'Error 403 desciption',
        ]);
    }
}
