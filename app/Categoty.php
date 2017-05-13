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
    
    
    public function lessons() {
        return $this->hasMany(Lesson::class, 'category_id');
    }
}
