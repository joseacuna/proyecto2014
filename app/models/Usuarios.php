<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:43 PM
 */
class Usuarios extends Eloquent {


    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'usuarios';
    public $timestamps = false;

    public function roles_usuario() {
        return $this->hasMany('RolesUsuarios', 'usuario_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }

}