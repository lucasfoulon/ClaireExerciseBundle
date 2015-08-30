<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 30/08/15
 * Time: 12:57
 */

namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;

class AnnotateTag {

    /**
     * @var ListAnnotate
     */
    private $list_annotate;

    /**
     * @var ExerciseResource
     */
    private $resource;

    /**
     * @var Annotate
     */
    private $annotate;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * Set list_annotate
     *
     * @param ListAnnotate $list_annotate
     */
    public function setListAnnotate($list_annotate)
    {
        $this->list_annotate = $list_annotate;
    }

    /**
     * Get list_annotate
     *
     * @return ListAnnotate
     */
    public function getListAnnotate()
    {
        return $this->list_annotate;
    }

    /**
     * Set resource
     *
     * @param ExerciseResource $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get resource
     *
     * @return ExerciseResource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /*
     * Set annotate
     *
     * @param Annotate $annotate
     */
    public function setAnnotate($annotate)
    {
        $this->annotate = $annotate;
    }

    /**
     * Get annotate
     *
     * @return Annotate
     */
    public function getAnnotate()
    {
        return $this->annotate;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set key
     *
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get start
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set start
     *
     * @param int $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * Get end
     *
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set end
     *
     * @param int $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

}