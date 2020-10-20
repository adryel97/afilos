<?php 

namespace App\Controller;

use League\Plates\Engine;

class Produto 
{
    private $view;
    
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->view = new Engine('view', 'php');
    }

    public function estoque()
    {
        echo $this->view->render('estoque');
    }
}