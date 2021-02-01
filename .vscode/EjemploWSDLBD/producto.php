<?php
class Producto
{
    private $nombreProducto;
    private $precioSinIVA;
    private $precioConIVA;

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    
    public function getPrecioSinIVA()
    {
        return $this->precioSinIVA;
    }

   
    public function setPrecioSinIVA($precioSinIVA)
    {
        $this->precioSinIVA = $precioSinIVA;

        return $this;
    }

    
    public function getPrecioConIVA()
    {
        return $this->precioConIVA;
    }


    public function setPrecioConIVA($precioConIVA)
    {
        $this->precioConIVA = $precioConIVA;

        return $this;
    }

   /**
    * Undocumented function
    *
    * @param string $nombre
    * @return string $result
    */
    public function datos(string $nombre)
    {
        require_once "gbd.php";
        require "Producto.php";
        $conexion = new GBD("localhost", "producto", "root", "");
        $producto = $conexion->findById("productos", [$nombre]);
        $nombreProducto = $producto[0]->getNombreProducto();
        $precioSinIva = $producto[0]->getPrecioSinIVA();
        $precioConIva= $producto[0]->getPrecioConIVA();
        

        return "Nombre: ". $nombreProducto . " Precio sin iva: ". $precioSinIva . " Precio con iva ". $precioConIva;    }

}
