<?php

namespace App\Controllers;
use App\Models\TblCatPeliculaModel;
class Taquilla extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbl_cat_pelicula");
        $resultado = $query->getResult();

        $data = ['titulo' => 'Cartelera de cine', 'pelicula' => $resultado, 'peliculas' => $resultado];
        return view('Cartelera/Index', $data);
    }

    public function insertarPelicula()
    {
        $nombre = $this->request->getPost('nombre');
        $url = $this->request->getPost('url');
        $precio = $this->request->getPost('precio');

        $db = \Config\Database::connect();
        $db->query("CALL AddPelicula(?, ?, ?)", [$nombre, $url, $precio]);
        return redirect()->to(site_url('taquilla'));
    }

    public function insertarBoleto()
    {
        $nombre = $this->request->getPost('Nombre');
        $entradas = $this->request->getPost('Entradas');
        $total = $this->request->getPost('Total');
        $pagar = $this->request->getPost('Pagar');
        $cambio = $this->request->getPost('Cambio');
        $pelicula = $this->request->getPost('Pelicula');

        $db = \Config\Database::connect();
        $db->query("CALL AddBoleto(?, ?, ?, ?, ?, ?)", [$nombre, $entradas, $total, $pagar, $cambio, $pelicula]);
        return redirect()->to(site_url('taquilla'));
    }
}