<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:39 PM
 */
class Pautas extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'pautas';
    public $timestamps = false;

    public function evaluaciones(){
        return $this->belongsTo('Evaluaciones');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
}