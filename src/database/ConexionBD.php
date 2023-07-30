<?php
class ConectarBD
{
    public function conex()
    {
        $conexion = mysqli_connect("localhost","root","","hospital_cima");
        return $conexion;
    }
}
?>
