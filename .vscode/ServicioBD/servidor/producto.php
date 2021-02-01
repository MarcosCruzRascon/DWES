<?php
class Producto
{
    private $nombreProducto;
    private $precioSinIVA;
    private $precioConIVA;

    /**
     * Get the value of nombreProducto
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombreProducto
     *
     * @return  self
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get the value of precioSinIVA
     */
    public function getPrecioSinIVA()
    {
        return $this->precioSinIVA;
    }

    /**
     * Set the value of precioSinIVA
     *
     * @return  self
     */
    public function setPrecioSinIVA($precioSinIVA)
    {
        $this->precioSinIVA = $precioSinIVA;

        return $this;
    }

    /**
     * Get the value of precioConIVA
     */
    public function getPrecioConIVA()
    {
        return $this->precioConIVA;
    }

    /**
     * Set the value of precioConIVA
     *
     * @return  self
     */
    public function setPrecioConIVA($precioConIVA)
    {
        $this->precioConIVA = $precioConIVA;

        return $this;
    }

    /**
     *
     * @param string $nombre
     * @return string $result
     */
    public function datos(string $nombre)
    {
        require_once "gbd.php";
        $conexion = new GBD("localhost", "producto", "root", "","mysql");
        $producto = $conexion->findById("productos", [$nombre]);

        return $producto[0]->getNombreProducto() . " " . $producto[0]->getPrecioSinIVA() . " " . $producto[0]->getPrecioConIVA();
    }
}
