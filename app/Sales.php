<?php

namespace App;
use App\Menu;
use App\Table;
use App\Servants;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable=["quantity","totale_price" ,
     "totale_reseved" ,"change","type_payement","payement_statu","servant_id"];
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
    public function tables(){
        return $this->belongsToMany(Table::class);
    }
    public function servant(){
        return $this->belongsTo(Servants::class);
    }
}
