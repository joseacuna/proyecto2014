<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 05:51 PM
 */
class Docentes extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'docente';
    public $timestamps = false;

    public function departamento(){
        return $this->belongsTo('Departamentos');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function cursos() {
        return $this->hasMany('Cursos', 'asignatura_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}