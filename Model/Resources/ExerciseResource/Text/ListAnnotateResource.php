<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 12/09/15
 * Time: 22:13
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text;


class ListAnnotateResource
{

    /**
     * @var string $text
     * @Serializer\Type("string")
     * @Serializer\Groups({"details", "resource_storage"})
     * @Assert\NotBlank(groups={"create"})
     */
    private $text;

    /**
     * @var array $annotates An array of Annotates
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text\AnnotateResource>")
     * @Serializer\Groups({"details", "resource_storage"})
     */
    private $annotate = array();

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
     * Add annotate
     *
     * @param <SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\Text\AnnotateResource> $annotate
     */
    public function addAnnotate($annotate)
    {
        $this->annotate[] = $annotate;
    }

}