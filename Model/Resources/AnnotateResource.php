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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"list","details", "resource_list", "knowledge_list"})
     * @Assert\NotBlank(groups={"create","edit"})
     */
    private $value;

    /**
     * @var int $start Position start of annotate
     * @Serializer\Type("integer")
     * @Serializer\Groups({"details", "list", "resource_list"})
     * @Assert\Blank(groups={"create","edit"})
     */
    protected $start;

    /**
     * @var int $end Position end of annotate
     * @Serializer\Type("integer")
     * @Serializer\Groups({"details", "list", "resource_list"})
     * @Assert\Blank(groups={"create","edit"})
     */
    protected $end;

    /**
     * @var array
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\AnnotateTagResource>")
     * @Serializer\Groups({"details", "resource_list"})
     */
    protected $annotate_tag;

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

    /**
     * Get start
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set start
     *
     * @param int $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * Get end
     *
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set end
     *
     * @param int $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * Set annotateTag
     *
     * @param array $annotate_tag
     */
    public function setAnnotateTag($annotate_tag)
    {
        $this->annotate_tag = $annotate_tag;
    }

    /**
     * Get annotateTag
     *
     * @return array
     */
    public function getAnnotateTag()
    {
        return $this->annotate_tag;
    }
}