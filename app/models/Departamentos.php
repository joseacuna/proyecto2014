<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 05:43 PM
 */
class Departamentos extends Eloquent {


    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'facultades';
    public $timestamps = false;

    public function facultades(){
        return $this->belongsTo('Facultades');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function asignaturas() {
        return $this->hasMany('Asignaturas', 'departamento_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
    public function docentes() {
        return $this->hasMany('Docentes', 'departamento_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
    public function escuelas() {
        return $this->hasMany('Escuelas', 'departamento_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }


}