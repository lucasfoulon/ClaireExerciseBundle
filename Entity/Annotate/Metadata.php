<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 27/08/15
 * Time: 18:21
 */

namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\Metadata as BaseMetadata;

/**
 * Annotate Metadata entity
 */
class Metadata extends BaseMetadata
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
    private $list_annotate_name;

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
     * Set the list_annotate
     *
     * @param ListAnnotate $entity
     */
    public function setEntity($entity)
    {
        $this->list_annotate = $entity;
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
     * Get list_annotate_name
     *
     * @return string
     */
    public function getListAnnotateName()
    {
        return $this->list_annotate_name;
    }

    /**
     * Set list_annotate_name
     *
     * @param string $list_annotate_name
     */
    public function setListAnnotateName($list_annotate_name)
    {
        $this->list_annotate_name = $list_annotate_name;
    }
}
