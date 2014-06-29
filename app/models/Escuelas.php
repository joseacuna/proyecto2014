<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:29 PM
 */
class Escuelas extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'escuelas';
    public $timestamps = false;

    public function departamentos(){
        return $this->belongsTo('Departamentos');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

    public function carreras() {
        return $this->hasMany('Carreras', 'escuela_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}