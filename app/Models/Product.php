<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    static function NewProducts() {
        $sNow = date('Y-m-d H:i:s');
        $sNextWeek = date('Y-m-d H:i:s', strtotime($sNow . ' + 1 week'));
        return Product::where(DB::raw('date_format(updated_at,
        "%Y-%m-%d")'), '>=', date('Y-m-d', strtotime($sNow)))
        ->where('updated_at', '<=', date('Y-m-d', strtotime($sNextWeek)))
        ->get();
       }
       //Devuelve los productos en oferta y ademas aquellos cuya fecha de inicio y fin de descuento se encuentra en el dia de hoy
       static function Offerings(){
        $sNow = date('Y-m-d H:i:s');
        return Product::where('discountPercent', '>', 0)
        ->where('discountStart_at', '<=', $sNow)
        ->where('discountEnd_at', '>=', $sNow)
        ->get();
       }
       // funcion que devuelva true si el descuento no es nulo y si la fecha actual se encuentra entre la fecha de inicio y fin de descuento
       public function HasDiscount(){
        $sNow = date('Y-m-d H:i:s');
        return $this->discountPercent > 0 && $this->discountStart_at <= $sNow && $this->discountEnd_at >= $sNow;
       }
       /*Crear, en Product.php, el método publico Company(), que devuelve la instancia de
la empresa a la que pertenece el producto, siguiendo las pautas referidas en el tutorial
de Laravel relativo a las relaciones.*/
         public function Company(){
          return $this->belongsTo(Company::class);
         }





    use HasFactory;
}
