<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reaction
 *
 * @package App
 * @property enum $type
 * @property string $title
 * @property string $audio
 * @property text $content
*/
class Reaction extends Model
{
    protected $fillable = ['type', 'title', 'audio', 'content'];
    

    public static $enum_type = ["correct" => "Correct", "incorrect" => "Incorrect"];
    
}
