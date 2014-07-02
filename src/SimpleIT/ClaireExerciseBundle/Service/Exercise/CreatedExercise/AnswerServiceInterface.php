<?php

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\CreatedExercise;

use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Answer;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnswerResource;

/**
 * Interface for a service which manages the stored exercises
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
interface AnswerServiceInterface
{
    /**
     * Create an answer to an item
     *
     * @param int            $itemId
     * @param AnswerResource $answerResource
     * @param int            $attemptId
     * @param int            $userId
     *
     * @return Answer
     */
    public function add($itemId, AnswerResource $answerResource, $attemptId, $userId);

    /**
     * Get all answers for an item
     *
     * @param int  $itemId Item id
     * @param int  $attemptId
     * @param null $userId
     *
     * @return array
     */
    public function getAll($itemId = null, $attemptId = null, $userId = null);
}
