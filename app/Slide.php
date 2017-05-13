<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slide
 *
 * @package App
 * @property enum $slider_type
 * @property string $name
 * @property string $audio
 * @property text $content
 * @property string $lesson
 * @property tinyInteger $is_active
*/
class Slide extends Model
{
    protected $fillable = ['slider_type', 'name', 'audio', 'content', 'is_active', 'lesson_id'];
    

    public static $enum_slider_type = ["presentation" => "Presentation", "test" => "Test"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLessonIdAttribute($input)
    {
        $this->attributes['lesson_id'] = $input ? $input : null;
    }
    
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    
}
