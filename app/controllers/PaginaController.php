<?php

class Pagina extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
       // echo 'pagina cargado';
    }

    public function index()
    {
        $products = $this->productModel->all();
        $data = [
            'titulo' => 'Bienvenido a mi MVC',
            'products' => $products
        ];

        $this->view('modules/inicio', $data);
    }

    public function articulo()
    {

    }

    public function actualizar($num_registro)
    {
        echo $num_registro;
    }
}