<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 18:34
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AnnotateResource
 */
class AnnotateResource
{
    /**
     * @const RESOURCE_NAME = 'Annotate'
     */
    const RESOURCE_NAME = 'Annotate';

    /**
     * @var int $id Id of annotate
     * @Serializer\Type("integer")
     * @Serializer\Groups({"details", "list", "resource_list"})
     * @Assert\Blank(groups={"create","edit"})
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"list","details", "resource_list", "knowledge_list"})
     * @Assert\NotBlank(groups={"create","edit"})
     */
    private $value;

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
}