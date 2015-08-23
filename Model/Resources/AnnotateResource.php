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