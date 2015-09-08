<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 30/07/15
 * Time: 10:46
 */

namespace SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\TextExercise;

use JMS\Serializer\Annotation as Serializer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\Common\CommonModel;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseObject\ExerciseTextObject;

/**
 *
 */
class Model extends CommonModel
{
    /**
     * @var array $textBlocks An array of TextBlock
     * @Serializer\Type("array<SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\TextExercise\TextBlock>")
     * @Serializer\Groups({"details", "exercise_model_storage"})
     */
    private $textBlocks = array();

    /**
     * @var boolean $shuffleQuestionsOrder True if the questions have to be shuffled
     * @Serializer\Type("boolean")
     * @Serializer\Groups({"details", "exercise_model_storage"})
     */
    private $shuffleQuestionsOrder;

    /**
     * Get the text blocks
     *
     * @return array An array of TextBlock
     */
    public function getTextBlocks()
    {
        return $this->textBlocks;
    }

    /**
     * Set text blocks
     *
     * @param array $textBlocks An array of TextBlock
     */
    public function setTextBlocks($textBlocks)
    {
        $this->textBlocks = $textBlocks;
    }

    /**
     * Add a text block
     *
     * @param ExerciseTextObject $textBlock
     */
    public function addTextBlock(ExerciseTextObject $textBlock)
    {
        $this->textBlocks[] = $textBlock;
    }

    /**
     * Get shuffleQuestionsOrder
     *
     * @return boolean
     */
    public function isShuffleQuestionsOrder()
    {
        return $this->shuffleQuestionsOrder;
    }

    /**
     * Set shuffleQuestionsOrder
     *
     * @param boolean $shuffleQuestionsOrder
     */
    public function setShuffleQuestionsOrder($shuffleQuestionsOrder)
    {
        $this->shuffleQuestionsOrder = $shuffleQuestionsOrder;
    }
}
