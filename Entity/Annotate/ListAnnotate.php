<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:04
 */
namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;


class ListAnnotate
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var ExerciseResource
     */
    private $resource;

    /**
     * @var string
     */
    private $name;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
