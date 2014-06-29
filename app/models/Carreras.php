<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:34 PM
 */
class Carreras extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'producto';
    public $timestamps = false;

    public function escuelas(){
        return $this->belongsTo('Escuelas');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
}