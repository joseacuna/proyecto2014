<?php
/**
 * Created by IntelliJ IDEA.
 * User: slenderman
 * Date: 28-06-14
 * Time: 06:04 PM
 */
class TipoEvaluacion extends Eloquent {
    protected $primaryKey='pk';// decirle a laravel que cambie el nombre de la clave primaria por defecto.
    protected $table = 'tipos_evaluaciones';
    public $timestamps = false;

    public function bodega(){
        return $this->belongsTo('Bodega');// lo que va dentro de la funcion es el nombre del Modelo de laravel.
    }
    public function evaluaciones() {
        return $this->hasMany('Evaluaciones', 'tipo_fk'); // lo que va dentro de la funcion es el nombre del Modelo Producto.
    }
}