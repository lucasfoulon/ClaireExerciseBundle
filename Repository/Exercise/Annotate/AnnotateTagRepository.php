<?php
/**
 * Created by PhpStorm.
 * User: arabesque
 * Date: 30/08/15
 * Time: 19:59
 */

namespace SimpleIT\ClaireExerciseBundle\Repository\Exercise\Annotate;


use SimpleIT\ClaireExerciseBundle\Entity\Annotate\Annotate;
use SimpleIT\ClaireExerciseBundle\Entity\Annotate\ListAnnotate;
use SimpleIT\ClaireExerciseBundle\Entity\ExerciseResource\ExerciseResource;
use SimpleIT\ClaireExerciseBundle\Repository\BaseRepository;

class AnnotateTagRepository extends BaseRepository
{
    const ANNOTATE_TABLE = 'claire_exercise_resource_annotate_tag';

    const ENTITY_ID_FIELD_NAME = 'annotate';

    const ENTITY_NAME = 'annotate';


    /**
     * Delete all the annotate tag for an entity
     *
     * @param ExerciseResource $entity
     */
    public function deleteAllByEntity($entity)
    {
        if (count($entity->getListAnnotate()) > 0) {
            foreach($entity->getListAnnotate() as $list_annotate) {
                $this->deleteAllByListAnnotate($entity,$list_annotate);
            }
        }
    }

    /**
     * Delete all the annotate tag for an list annotate
     *
     * @param ExerciseResource $entity
     * @param ListAnnotate $list_annotate
     *
     */
    public function deleteAllByListAnnotate($entity,$list_annotate)
    {
        if (count($list_annotate->getAnnotate()) > 0) {
            foreach($list_annotate->getAnnotate() as $annotate) {
                if (count($annotate->getAnnotateTag()) > 0) {
                    $this->deleteAllByAnnotate($entity,$list_annotate,$annotate);
                }
            }
        }
    }

    /**
     * Delete all the annotate tag for an annotate
     *
     * @param ExerciseResource $entity
     * @param ListAnnotate $list_annotate
     * @param Annotate $annotate
     */
    public function deleteAllByAnnotate($entity,$list_annotate,$annotate)
    {
        if (count($annotate->getAnnotateTag()) > 0) {
            $qb = $this->createQueryBuilder('at');
            $qb->delete(get_class($annotate->getAnnotateTag()[0]), 'at');
            $qb->where($qb->expr()->eq('at.resource', $entity->getId()));
            $qb->andWhere($qb->expr()->eq('at.list_annotate_name', '\''.$list_annotate->getName()).'\'');
            $qb->andWhere($qb->expr()->eq('at.start', '\''.$annotate->getStart()).'\'');
            $qb->andWhere($qb->expr()->eq('at.end', '\''.$annotate->getEnd()).'\'');
            $qb->getQuery()->getResult();
        }
    }

}