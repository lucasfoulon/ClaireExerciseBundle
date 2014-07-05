<?php

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseCreation;

use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Answer;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Item;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseModel\ExerciseModel;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnswerResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\Common\CommonExercise;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResource;

/**
 * Service which manages the exercise generation
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
interface ExerciseServiceInterface
{
    /**
     * Correct an item from an exercise
     *
     * @param Answer $answer Answer
     *
     * @return ItemResource The corrected item
     * @throws \Exception
     */
    public function correctItem(Answer $answer);

    /**
     * Generate an exercise from the id of the model
     *
     * @param ExerciseModel $exerciseModel
     *
     * @return CommonExercise The generated exercise
     */
    public function generateExercise($exerciseModel);

    /**
     * Validate learner's answer format
     *
     * @param Item           $item
     * @param AnswerResource $answerResource
     */
    public function validateAnswer(Item $item, AnswerResource $answerResource);

    /**
     * Return an item without solution
     *
     * @param ItemResource $itemResource
     *
     * @return ItemResource
     */
    public function noSolutionItem($itemResource);
}
