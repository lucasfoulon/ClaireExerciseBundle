<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 08/09/15
 * Time: 16:18
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Text
 */
class Annotate
{
    /**
     * @var string $text The text
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "corrected", "not_corrected", "item_storage"})
     */
    private $text;

    /**
     * Constructor
     *
     * @param string  $text
     */
    function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return string The text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set text
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}