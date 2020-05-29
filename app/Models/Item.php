<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
    use SoftDeletes;
    protected $table = 'items';

    protected $primaryKey = 'id';

    public $timestamps = true;

    // Asignación masiva
    protected $guarded =[]; //En vez de poner fillable y todos los atributos,
                            //con esto se anaden todos los atributos directamente.
    //Relaciones
    /*public function users()
    {
        return $this->belongsToMany('App\Models\User', 'items-users', 'item_id', 'user_id')->withPivot('date_inicio', 'date_fin')->withTimestamps();
        
    }*/

    protected $dates = ['deleted_at'];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
        
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
        
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type')->where('model', Item::class);
        
    }
    public function yearUnionUsers(){
        return $this->belongsToMany(YearUnionUser::class, 'ItemYear', 'item_id', 'year_user_id')->using(ItemYear::class)->withTimeStamps()->withPivot('id');
    }
}
