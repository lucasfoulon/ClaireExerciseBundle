<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 18:38
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\Annotate;

/**
 * Class AnnotateResourceFactory
 */
abstract class AnnotateResourceFactory
{
    /**
     * Create a Annotate Resources collection
     *
     * @param mixed $annotates Annotates
     *
     * @return array
     */
    public static function createCollection($annotates = array())
    {
        $annotateResources = array();
        foreach ($annotates as $annotate) {
            /** @var Annotate $annotate */
            $annotateResources[] = self::create($annotate);
        }

        return $annotateResources;
    }

    /**
     * Create Annotate Resource
     *
     * @param Annotate $annotate Annotate
     *
     * @return AnnotateResource
     */
    public static function create($annotate)
    {
        $annotateResource = new AnnotateResource();
        $annotateResource->setValue($annotate->getValue());

        return $annotateResource;
    }

    /**
     * Create Annotate Resource
     *
     * @param string $value
     *
     * @return AnnotateResource
     */
    public static function createFromValue($value)
    {
        $annotateResource = new AnnotateResource();
        $annotateResource->setValue($value);

        return $annotateResource;
    }
}