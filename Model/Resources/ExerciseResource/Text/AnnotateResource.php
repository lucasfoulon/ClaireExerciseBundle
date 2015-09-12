<?php

/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 12/09/15
 * Time: 21:33
 */
namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text;

class AnnotateResource
{

    /**
     * @var string $text
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "resource_storage"})
     * @Assert\NotBlank(groups={"create"})
     */
    private $text;

    /**
     * Set text
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}