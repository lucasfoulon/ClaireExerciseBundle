<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:41
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use SimpleIT\ClaireExerciseBundle\Entity\Annotate\ListAnnotate;

/**
 * Class ListAnnotateResourceFactory
 */
abstract class ListAnnotateResourceFactory
{
    /**
     * Create a List Annotate Resources collection
     *
     * @param mixed $list_annotates ListAnnotates
     *
     * @return array
     */
    public static function createCollection($list_annotates = array())
    {
        $listAnnotateResources = array();
        foreach ($list_annotates as $list_annotate) {
            /** @var ListAnnotate $list_annotate */
            $listAnnotateResources[] = self::create($list_annotate);
        }

        return $listAnnotateResources;
    }

    /**
     * Create List Annotate Resource
     *
     * @param ListAnnotate $listAnnotate ListAnnotate
     *
     * @return ListAnnotateResource
     */
    public static function create($list_annotate)
    {
        $listAnnotateResource = new ListAnnotateResource();
        $listAnnotateResource->setName($list_annotate->getName());
        //$listAnnotateResource->setAnnotate($list_annotate->getAnnotate());

        // annotate
        $annotateArray = array();
        /** @var Annotate $an */
        foreach ($list_annotate->getAnnotate() as $an) {
            $annotateArray[] = AnnotateResourceFactory::create(
                $an
            );
        }
        $listAnnotateResource->setAnnotate($annotateArray);

        // metadata //and keywords
        $metadataArray = array();
        $keywordArray = array();
        /** @var Metadata $md */
        foreach ($list_annotate->getMetadata() as $md) {
            if ($md->getKey() === MetadataResource::MISC_METADATA_KEY) {
                $keywordArray = array_merge($keywordArray, explode(';', $md->getValue()));
            } else {
                $metadataArray[] = MetadataResourceFactory::createFromKeyValue(
                    $md->getKey(),
                    $md->getValue()
                );
            }
        }
        $listAnnotateResource->setMetadata($metadataArray);
        $listAnnotateResource->setKeywords($keywordArray);

        return $listAnnotateResource;
    }

    /**
     * Create List Annotate Resource
     *
     * @param string $value
     *
     * @return ListAnnotateResource
     */
    public static function createFromName($name)
    {
        $listAnnotateResource = new ListAnnotateResource();
        $listAnnotateResource->setName($name);

        return $listAnnotateResource;
    }
}