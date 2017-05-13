<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $category
*/
class Lesson extends Model
{
    protected $fillable = ['name', 'description', 'category_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsTo(Categoty::class, 'category_id');
    }
    
}
