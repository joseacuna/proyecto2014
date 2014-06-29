<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 05:39 PM
 */

class Facultades extends Eloquent {


    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'facultades';
    public $timestamps = false;

    public function departamentos() {
        return $this->hasMany('Departamentos', 'facultad_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }

}