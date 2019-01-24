<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculasController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('peliculasModel');
    }

    public function index()
    {
        $this->load->view('inicio');
    }
    public function guardar()
    {

        if($_POST){
            $this->peliculasModel->guardar($_POST);
        }
        $this->load->view('inicio');
    }
    public function borrar()
    {
        $this->peliculasModel->borrar($_GET);
        $this->load->view('inicio');
    }
}
