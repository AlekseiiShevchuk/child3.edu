<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoty
 *
 * @package App
 * @property string $name
*/
class Categoty extends Model
{
    protected $fillable = ['name'];
    
    
    public function lesson() {
        return $this->hasMany(Lesson::class, 'category_id');
    }
}
