<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:37
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ListAnnotateResource
 */
class ListAnnotateResource
{
    /**
     * @const RESOURCE_NAME = 'ListAnnotate'
     */
    const RESOURCE_NAME = 'ListAnnotate';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"list","details", "resource_list", "knowledge_list"})
     * @Assert\NotBlank(groups={"create","edit"})
     */
    private $name;

    /**
     * @var array
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateResource>")
     * @Serializer\Groups({"details", "resource_list"})
     */
    protected $annotate;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\Groups({"details", "resource_list"})
     */
    protected $keywords;

    /**
     * @var array
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\MetadataResource>")
     * @Serializer\Groups({"details", "resource_list"})
     */
    protected $metadata;

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
     * @param array $annotate
     */
    public function setAnnotate($annotate)
    {
        $this->annotate = $annotate;
    }

    /**
     * Get annotate
     *
     * @return array
     */
    public function getAnnotate()
    {
        return $this->annotate;
    }

    /**
     * Set metadata
     *
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * Get metadata
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set keywords
     *
     * @param array $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Get keywords
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
}