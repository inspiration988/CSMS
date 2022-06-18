<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Product
 * @package App\Models
 * @version April 19, 2022, 3:11 pm +03

 * @property string $category
 * @property string $sku
 * @property integer $price
 * @property string $name
 */
class Product extends Model
{


    public function __construct(){
        
        $jsonData = file_get_contents(__DIR__."/product.json");
        $this->collection = collect(json_decode($jsonData));
    
    }
    
    use HasFactory;

    
    public $fillable = [
        'name',
        'category',
        'sku',
        'price',
    
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sku' => 'string',
        'category' => 'string',
        'name' => 'string',
        'price' => 'integer',
        
    ];

    

}
