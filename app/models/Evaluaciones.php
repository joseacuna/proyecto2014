<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:08 PM
 */

class Evaluaciones extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'evaluaciones';
    public $timestamps = false;

    public function cursos(){   // es hija de cursos
        return $this->belongsTo('Cursos');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
    public function periodos(){ // es hija de periodos
        return $this->belongsTo('Periodos');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
    public function tipo_evaluacion(){ // es hija de tipos de evaluacion
        return $this->belongsTo('TipoEvaluacion');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
    public function contenidos() {
        return $this->hasMany('Contenidos', 'departamento_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
    public function pautas() {
        return $this->hasMany('Pautas', 'departamento_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}