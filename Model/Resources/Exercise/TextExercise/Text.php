<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 11/09/15
 * Time: 15:49
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\Common\CommonItem;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\Common\Markable;

/**
 * Class Text
 */
class Text extends CommonItem implements Markable
{
    /**
     * @var Text $text The text
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "corrected", "not_corrected", "item_storage"})
     */
    private $text;

    /**
     * @var array $annotates An array of Annotate
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise\Annotate>")
     * @Serializer\Groups({"details", "corrected", "not_corrected", "item_storage"})
     */
    private $annotates = array();

    /**
     * Set text
     *
     * @param string $text
     */
    public function setText($text)
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
     * Add an annotate
     *
     * @param string  $text  The annotate text
     */
    public function addAnnotate($text)
    {
        $this->annotates[] = new Annotate($text);
    }

    /**
     * Get annotates
     *
     * @return array An array ofAnnotate.
     */
    public function getAnnotates()
    {
        return $this->annotates;
    }
}