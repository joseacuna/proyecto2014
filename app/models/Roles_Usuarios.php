<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:45 PM
 */
class Roles_Usuarios extends Eloquent {


    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'roles_usuarios';
    public $timestamps = false;

    public function usuarios(){
        return $this->belongsTo('Usuarios');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
    public function roles(){
        return $this->belongsTo('Roles');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }

}