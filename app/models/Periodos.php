<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 05:58 PM
 */
class Producto extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'periodos';
    public $timestamps = false;

    public function bodega(){
        return $this->belongsTo('Bodega');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function evaluaciones() {
        return $this->hasMany('Evaluaciones', 'periodo_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}