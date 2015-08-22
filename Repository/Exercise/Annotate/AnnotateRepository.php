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
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
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

    /**
     * Find a collection with parameters from collection information
     *
     * @param Resource $resource Resource
     *
     * @throws ApiNotFoundException
     * @return array
     */
    public function findAllBy($resource = null)
    {
        $queryBuilder = $this->createQueryBuilder('a');

        if (!is_null($resource)) {
            $queryBuilder->where(
                $queryBuilder->expr()->eq(
                    'a.resource',
                    $resource->getId()
                )
            );
        }

        $queryBuilder->add('orderBy', 'a.value', true);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Delete all the annotate for an entity
     *
     * @param ExerciseResource $entity
     */
    public function deleteAllByEntity($entity)
    {
        if (count($entity->getMetadata()) > 0) {
            $qb = $this->createQueryBuilder('a');
            $qb->delete(get_class($entity->getAnnotate()[0]), 'a');
            $qb->where($qb->expr()->eq('a.resource', $entity->getId()));
            $qb->getQuery()->getResult();
        }
    }
}