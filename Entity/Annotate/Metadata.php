<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 27/08/15
 * Time: 18:21
 */

namespace SimpleIT\ClaireExerciseBundle\Entity\Annotate;

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
     * Set list_annotate
     *
     * @param ListAnnotate $list_annotate
     */
    public function setResource($list_annotate)
    {
        $this->list_annotate = $list_annotate;
    }

    /**
     * Get list_annotate
     *
     * @return ListAnnotate
     */
    public function getResource()
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
}
