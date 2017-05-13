<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @package App
 * @property string $text_answer
 * @property string $image_answer
 * @property tinyInteger $is_correct
 * @property string $slide
*/
class Answer extends Model
{
    protected $fillable = ['text_answer', 'image_answer', 'is_correct', 'slide_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSlideIdAttribute($input)
    {
        $this->attributes['slide_id'] = $input ? $input : null;
    }
    
    public function slide()
    {
        return $this->belongsTo(Slide::class, 'slide_id');
    }
    
}
