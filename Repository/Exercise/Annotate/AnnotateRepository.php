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
use SimpleIT\ClaireExerciseBundle\Repository\BaseRepository;

/**
 * Annotate repository
 */
class AnnotateRepository extends BaseRepository
{
    const ANNOTATE_TABLE = 'claire_exercise_resource_annotate';

    const ENTITY_ID_FIELD_NAME = 'list_annotate_id';

    const ENTITY_NAME = 'list_annotate';

    /**
     * Find a collection with parameters from collection information
     *
     * @param ListAnnotate $list_annotate ListAnnotate
     *
     * @throws ApiNotFoundException
     * @return array
     */
    public function findAllBy($list_annotate = null)
    {
        $queryBuilder = $this->createQueryBuilder('a');

        if (!is_null($list_annotate)) {
            $queryBuilder->where(
                $queryBuilder->expr()->eq(
                    'a.list_annotate',
                    $list_annotate->getId()
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
        if (count($entity->getListAnnotate()) > 0) {
            $list = $entity->getListAnnotate();
            $qb = $this->createQueryBuilder('a');
            //$list_annotate->getResource()->getId();
            $qb->delete(get_class($list[0]->getAnnotate()[0]), 'a');
            $qb->where($qb->expr()->eq('a.resource', $entity->getId()));
            $qb->getQuery()->getResult();


            /*foreach($entity->getListAnnotate() as $list_annotate) {
               $this->deleteAllByListAnnotate($list_annotate);
            }*/
        }
    }

    /**
     * Delete all the annotate for an list annotate
     *
     * @param ListAnnotate $list_annotate
     */
    public function deleteAllByListAnnotate($list_annotate)
    {
        if (count($list_annotate->getAnnotate()) > 0) {
            $qb = $this->createQueryBuilder('a');
            //$list_annotate->getResource()->getId();
            $qb->delete(get_class($list_annotate->getAnnotate()[0]), 'a');
            $qb->where($qb->expr()->eq('a.list_annotate', $list_annotate->getName()));
            $qb->getQuery()->getResult();
        }
    }
}