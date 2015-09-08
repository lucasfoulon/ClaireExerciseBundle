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
     * @var array $annotates An array of Annotate
     * @Serializer\Exclude
     */
    private $annotates = array();

    /**
     * Get annotate at index $key
     *
     * @param int $key The index
     *
     * @return Annotate The annotate
     */
    public function getAnnotate($key)
    {
        return $this->annotates[$key];
    }

    /**
     * Get annotates
     *
     * @return array An array of ExerciseAnnotate
     */
    public function getAnnotates()
    {
        return $this->annotates;
    }

    /**
     * Add a annotate
     *
     * @param Annotate $annotate
     */
    public function addAnnotate(Annotate $annotate)
    {
        $this->annotates[] = $annotate;
    }

    /**
     * Get the number of annotates
     *
     * @return int The number of annotates
     */
    public function getNumberOfAnnotates()
    {
        return count($this->annotates);
    }

    /**
     * Compute the itemCount
     */
    public function finalize()
    {
        $this->itemCount = count($this->annotates);
    }

}