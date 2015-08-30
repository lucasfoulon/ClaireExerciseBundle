<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 12:02
 */
namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;


use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;

class Annotate
{

    /**
     * @var ListAnnotate
     */
    private $list_annotate;

    /**
     * @var ExerciseResource
     */
    private $resource;

    /**
     * @var string
     */
    private $value;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * @var Collection
     */
    protected $annotate_tag;

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

    /**
     * Set annotate_tag
     *
     * @param \Doctrine\Common\Collections\Collection $annotate_tag
     */
    public function setAnnotateTag($annotate_tag)
    {
        $this->annotate_tag = $annotate_tag;
    }

    /**
     * Get annotate_tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnotateTag()
    {
        return $this->annotate_tag;
    }
}
