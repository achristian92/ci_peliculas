<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculasModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function guardar($post)
    {
        $datosPelicula = array();
        $datosPelicula['id'] = $post['id'];
        $datosPelicula['titulo'] = $post['titulo'];
        $datosPelicula['resumen'] = $post['resumen'];
        $datosPelicula['ano'] = $post['ano'];
        $datosPelicula['pais'] = $post['pais'];
        $datosPelicula['protagonistas'] = $post['protagonistas'];

        if($datosPelicula['id'] > 0){
            $this->db->where('id',$datosPelicula['id']);
            $this->db->update('peliculas',$datosPelicula);
            $ruta = base_url('peliculasController');
            echo "<script>alert('Actualizado con exito');window.location= '{$ruta}';</script>";

        }else{
            //ghuardar
            $this->db->insert('peliculas',$datosPelicula);
            $ruta = base_url('peliculasController');
            echo "<script>alert('Guardado con exito');window.location= '{$ruta}';</script>";
        }

    }
    public function borrar($get)
    {
        $this->db->where('id',$get['borrar']);
        $this->db->delete('peliculas');
    }


}