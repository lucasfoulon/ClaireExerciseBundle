<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 08/09/15
 * Time: 15:37
 */

namespace SimpleIT\ClaireExerciseBundle\Service\Exercise\ExerciseCreation;

use Claroline\CoreBundle\Entity\User;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Answer;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Item;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseModel\ExerciseModel;
use SimpleIT\ClaireExerciseBundle\Exception\InvalidAnswerException;
//use SimpleIT\ClaireExerciseBundle\Model\ExerciseObject\MultipleChoiceQuestion;
use SimpleIT\ClaireExerciseBundle\Model\Resources\AnswerResourceFactory;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise\Annotate;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise\Exercise;
//use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\MultipleChoice\Proposition;
//use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\MultipleChoice\Question;
use SimpleIT\ClaireExerciseBundle\Model\Resources\Exercise\TextExercise\Text;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\Common\CommonModel;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\TextExercise\Model;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseModel\TextExercise\TextBlock;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource\CommonResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResource;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ItemResourceFactory;

class TextExerciseService extends ExerciseCreationService
{
    /**
     * @inheritdoc
     */
    public function generateExerciseFromExerciseModel(
        ExerciseModel $exerciseModel,
        CommonModel $commonModel,
        User $owner
    )
    {
        /** @var Model $commonModel */
        // Generation of the exercise with the model
        $exercise = $this->generateTEExercise($exerciseModel, $commonModel, $owner);

        // Transformation of the exercise into entities (StoredExercise and Items)
        return $this->toStoredExercise(
            $exercise,
            $exerciseModel,
            "text-exercise",
            $exercise->getText()
        );
    }

    /**
     * Generate a multiple choice exercise from a model
     *
     * @param Model $model
     * @param User $owner
     *
     * @return Exercise
     */
    private function generateTEExercise(ExerciseModel $exerciseModel, Model $model, User $owner)
    {
        $exercise = new Exercise($model->getWording());

        // Documents
        $this->addDocuments($model, $exercise, $owner);

        $text = new Text();
        $text->setText("mon teeeeexte!");
        $text->addAnnotate("Mon annotate");
        $text->addAnnotate($exerciseModel->getName());
        $text->addAnnotate($exerciseModel->getTitle());

        foreach($exerciseModel->getExercises() as $exe)
        {
            //$text->addAnnotate("testtttttt");
        }

        // array to collect all the questions to add
        $modelQuestionToAdd = array();
        $recupText = array();

        // get the blocks
        foreach ($model->getTextBlocks() as $block) {
            $recupText = $this->mafunctionBlock($block,$owner);
        }

        foreach($recupText as $textetest) {

            $exerciseText = new Text();
            $exerciseText->setText($textetest->getText());


            $exercise->addText($exerciseText);
            $text->addAnnotate("prout");
        }

        $exercise->addText($text);

        //$exercise->finalize();

        return $exercise;
    }

    /**
     * TEST LUCAS
     *
     * @param TextBlock $block
     * @param User $owner
     *
     * @return array An array of Text
     */
    public function mafunctionBlock(TextBlock $block, User $owner) {

        $blockQuestions = array();
        $numOfQuestions = $block->getNumberOfOccurrences();
        /*
         * if the block is a list
         */
        if ($block->isList()) {
            $this->getObjectsFromList($block, $numOfQuestions, $blockQuestions, $owner);
        }

        return $blockQuestions;
    }



    /**
     * Inserts the correction in the item and adapt the solution to make it
     * unique and match as best the user's answer
     *
     * @param Item   $entityItem
     * @param Answer $answer
     *
     * @return ItemResource
     */
    public function correct(Item $entityItem, Answer $answer)
    {
        // MARCHE PAS
        //$entityItem->setType('text-exercise');
        //$entityItem->setContent('{"question":"Pourquoi \u00e7a marche pas?","propositions":[{"text":"pour le moment"},{"text":"on a gagn\u00e9"},{"text":"pourquoi pas"},{"text":"on sait pas"}],"origin_resource":2,"item_type":"multiple-choice-formula-question"}');

        $itemResource = ItemResourceFactory::create($entityItem);
        /** @var Annotate $annotate */
        $annotate = $itemResource->getContent();

        //$this->mark($question);
        //$question->setType('text-exercise');
        //$item->setContent('{"question":"Pourquoi \u00e7a marche pas?","propositions":[{"text":"pour le moment"},{"text":"on a gagn\u00e9"},{"text":"pourquoi pas"},{"text":"on sait pas"}],"origin_resource":2,"item_type":"multiple-choice-formula-question"}');

        //annotate ='{"question":"Pourquoi \u00e7a marche pas?","propositions":[{"text":"pour le moment"},{"text":"on a gagn\u00e9"},{"text":"pourquoi pas"},{"text":"on sait pas"}],"origin_resource":2,"item_type":"multiple-choice-formula-question"}';
        //$itemResource->setContent($annotate);

        return $itemResource;
    }

    /**
     * Validate the answer to an item
     *
     * @param Item  $itemEntity
     * @param array $answer
     *
     * @throws \LogicException
     */
    public function validateAnswer(Item $itemEntity, array $answer){}

    /**
     * Return an item without solution
     *
     * @param ItemResource $itemResource
     *
     * @return ItemResource
     */
    public function noSolutionItem($itemResource)
    {
        /** @var Question $content */
        $content = $itemResource->getContent();

        //$content->setComment(null);

        /** @var Proposition $prop */
        /*foreach ($content->getPropositions() as $prop) {
            $prop->setRight(null);
        }*/

        return $itemResource;
    }
}