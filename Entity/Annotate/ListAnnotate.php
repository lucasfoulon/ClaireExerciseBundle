<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:04
 */
namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\SharedEntity;


class ListAnnotate extends SharedEntity
{

    /**
     * @var ExerciseResource
     */
    private $resource;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $annotate;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->annotate = new ArrayCollection();
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

    /**
     * Set annotate
     *
     * @param \Doctrine\Common\Collections\Collection $annotate
     */
    public function setAnnotate($annotate)
    {
        $this->annotate = $annotate;
    }

    /**
     * Get annotate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnotate()
    {
        return $this->annotate;
    }
}
