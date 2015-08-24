<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 24/08/15
 * Time: 13:07
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
use SimpleIT\ClaireExerciseBundle\Repository\BaseRepository;

/**
 * ListAnnotate repository
 */
class ListAnnotateRepository extends BaseRepository
{
    const LIST_ANNOTATE_TABLE = 'claire_exercise_resource_list_annotate';

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
        $queryBuilder = $this->createQueryBuilder('la');

        if (!is_null($resource)) {
            $queryBuilder->where(
                $queryBuilder->expr()->eq(
                    'la.resource',
                    $resource->getId()
                )
            );
        }

        $queryBuilder->add('orderBy', 'la.name', true);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Delete all the list annotate for an entity
     *
     * @param ExerciseResource $entity
     */
    public function deleteAllByEntity($entity)
    {
        if (count($entity->getListAnnotate()) > 0) {
            $qb = $this->createQueryBuilder('la');
            $qb->delete(get_class($entity->getListAnnotate()[0]), 'la');
            $qb->where($qb->expr()->eq('la.resource', $entity->getId()));
            $qb->getQuery()->getResult();
        }
    }
}