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
     * @var int $id Id of list_annotate
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