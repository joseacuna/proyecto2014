<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 05:54 PM
 */
class Cursos extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'cursos';
    public $timestamps = false;

    public function asignaturas(){
        return $this->belongsTo('Asignaturas');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function docentes(){
        return $this->belongsTo('Docentes');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function evaluaciones() {
        return $this->hasMany('Evaluaciones', 'curso_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}