<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 29/07/15
 * Time: 13:32
 */

namespace SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate;

use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Attempt;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\Item;
use SimpleIT\ClaireExerciseBundle\Entity\CreatedExercise\StoredExercise;
use SimpleIT\ClaireExerciseBundle\Entity\SharedEntity\SharedEntity;
use SimpleIT\ClaireExerciseBundle\Exception\Api\ApiNotFoundException;
use SimpleIT\ClaireExerciseBundle\Exception\NonExistingObjectException;
use SimpleIT\ClaireExerciseBundle\Model\Collection\CollectionInformation;
use SimpleIT\ClaireExerciseBundle\Model\Resources\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Repository\BaseRepository;

/**
 * Annotate repository
 */
class AnnotateRepository extends BaseRepository
{
    const ANNOTATE_TABLE = 'claire_exercise_resource_annotate';

    const ENTITY_ID_FIELD_NAME = 'resource_id';

    const ENTITY_NAME = 'resource';

}