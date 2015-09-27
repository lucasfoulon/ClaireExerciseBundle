<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 08/09/15
 * Time: 16:17
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\Common\CommonExercise;

/**
 * Class Exercise
 */
class Exercise extends CommonExercise
{
    /**
     * @var array $text The text
     * @Serializer\Exclude
     */
    private $text = array();

    /**
     * @var array $annotates An array of Annotate
     * @Serializer\Exclude
     *
    private $annotates = array();*/

    /**
     * Get annotates
     *
     * @return array An array of annotate
     *
    public function getAnnotates()
    {
        return $this->annotates;
    }*/

    /**
     * Get annotate
     *
     * @param Annotate $annotate
     *
    public function setAnnotate($annotate)
    {
        $this->annotates = $annotate;
    }*/

    /**
     * Add a annotate
     *
     * @param Annotate $annotate
     *
    public function addAnnotate(Annotate $annotate)
    {
        $this->annotates[] = $annotate;
    }*/

    /**
     * Get text
     *
     * @return array The text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set text
     *
     * @param array $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Add a text
     *
     * @param Text $annotate
     */
    public function addText(Text $text)
    {
        $this->text[] = $text;
    }

    /**
     * Get the number of annotates
     *
     * @return int The number of annotates
     *
    public function getNumberOfAnnotates()
    {
        return count($this->annotates);
    }*/

    /**
     * Compute the itemCount
     *
    public function finalize()
    {
        $this->itemCount = count($this->annotates);
    */

}