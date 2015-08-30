<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 30/08/15
 * Time: 19:25
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\AnnotateTag;

/**
 * Class AnnotateTagResourceFactory
 */

class AnnotateTagResourceFactory
{
    /**
     * Create a Annotate Tag collection
     *
     * @param mixed $annotateTags AnnotateTags
     *
     * @return array
     */
    public static function createCollection($annotateTags = array())
    {
        $annotateTagsResources = array();
        foreach ($annotateTags as $annotateTag) {
            /** @var AnnotateTag $annotateTag */
            $annotateTagsResources[] = self::create($annotateTag);
        }

        return $annotateTagsResources;
    }

    /**
     * Create Annotate Tag
     *
     * @param AnnotateTag $annotateTag AnnotateTag
     *
     * @return annotateTagResource
     */
    public static function create($annotateTag)
    {
        $annotateTagResource = new AnnotateTagResource();
        $annotateTagResource->setKey($annotateTag->getKey());
        $annotateTagResource->setValue($annotateTag->getValue());

        return $annotateTagResource;
    }

    /**
     * Create Annotate Tag
     *
     * @param string $key
     * @param string $value
     *
     * @return AnnotateTagResource
     */
    public static function createFromKeyValue($key, $value)
    {
        $annotateTagResource = new AnnotateTagResource();
        $annotateTagResource->setKey($key);
        $annotateTagResource->setValue($value);

        return $annotateTagResource;
    }
}