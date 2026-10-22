<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;
use App\Models\Admin\productos;

class ProductosController extends Controller
{
    protected $categoriasModel;
    protected $productosModel;
    public function __construct()
    {
        $this->categoriasModel = new Categorias();
        $this->productosModel = new productos();
    }

    public function index()
    {
        $productos = $this->productosModel->buscar();
        $this->view('admin/productos/index', [
            'isAdmin' => true,
            'productos' => $productos,
            'module'    => 'admin',
            'pageTitle' => 'Productos'
        ]);
        exit;
    }
    public function nuevo()
    {
        $categorias = $this->categoriasModel->categorias_select();

        $this->view('admin/productos/nuevo', [
            'isAdmin' => true,
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Producto',
            'categorias' => $categorias
        ]);
        exit;
    }
    public function guardar()
    {
        $data = $_POST;
        //validar datos
        if (!empty($data['categoria']) && !empty($data['codigo']) && !empty($data['nombre']) && !empty($data['descripcion']) && !empty($data['precio_venta']) && !empty($data['stock'])) {
            //guardar producto
            //llmar al modelo de productos para guardar el producto en la base de datos
            $resultado = $this->productosModel->registrar($data);
            if ($resultado) {
                $_SESSION['flash_success'] = 'Producto registrado correctamente';
                header('Location: ' . BASE_URL . '/admin/productos');
            } else {
                $_SESSION['flash_error'] = 'Error al registrar el producto';
                header('Location: ' . BASE_URL . '/admin/productos/nuevo');
            }
        } else {
            header('Location: ' . BASE_URL . '/admin/productos/nuevo');
        }
    }
}
