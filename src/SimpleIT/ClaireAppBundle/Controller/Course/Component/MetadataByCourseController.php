<?php

namespace SimpleIT\ClaireAppBundle\Controller\Course\Component;

use SimpleIT\ApiResourcesBundle\Course\MetadataResource;
use SimpleIT\AppBundle\Util\RequestUtils;
use SimpleIT\Utils\ArrayUtils;
use SimpleIT\Utils\DateUtils;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MetadataController
 *
 * @author Romain Kuzniak <romain.kuzniak@simple-it.fr>
 */
class MetadataByCourseController extends AbstractMetadataController
{
    /**
     * View a course description
     *
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewDescriptionAction($courseIdentifier)
    {
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        $description = ArrayUtils::getValue(
            $metadatas,
            MetadataResource::COURSE_METADATA_DESCRIPTION
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/Metadata/Component:viewDescription.html.twig',
            array(
                MetadataResource::COURSE_METADATA_DESCRIPTION => $description
            )
        );
    }

    /**
     * Edit a course description
     *
     * @param Request      $request          Request
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editDescriptionAction(Request $request, $courseIdentifier)
    {
        $metadataName = MetadataResource::COURSE_METADATA_DESCRIPTION;
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );

        $form = $this->createFormBuilder($metadatas)
            ->add($metadataName, 'textarea')
            ->getForm();

        $form = $this->processCourseEdit(
            $request,
            $form,
            $courseIdentifier,
            $metadatas,
            $metadataName
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/MetadataByCourse/Component:editDescription.html.twig',
            array(
                'courseIdentifier' => $courseIdentifier,
                'form'             => $form->createView()
            )
        );
    }

    /**
     * View a course image
     *
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewImageAction($courseIdentifier)
    {
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        $image = ArrayUtils::getValue(
            $metadatas,
            MetadataResource::COURSE_METADATA_IMAGE
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/Metadata/Component:viewImage.html.twig',
            array(
                MetadataResource::COURSE_METADATA_IMAGE => $image
            )
        );
    }

    /**
     * Edit a course image
     *
     * @param Request          $request          Request
     * @param integer | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editImageAction(Request $request, $courseIdentifier)
    {
        $metadataName = MetadataResource::COURSE_METADATA_IMAGE;
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );

        $form = $this->createFormBuilder($metadatas)
            ->add($metadataName, 'url')
            ->getForm();

        $form = $this->processCourseEdit(
            $request,
            $form,
            $courseIdentifier,
            $metadatas,
            $metadataName
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/MetadataByCourse/Component:editImage.html.twig',
            array(
                'courseIdentifier' => $courseIdentifier,
                'form'             => $form->createView()
            )
        );
    }

    /**
     * View a course rating
     *
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewRatingAction($courseIdentifier)
    {
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        $rating = ArrayUtils::getValue(
            $metadatas,
            MetadataResource::COURSE_METADATA_AGGREGATE_RATING
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/Metadata/Component:viewRating.html.twig',
            array(
                MetadataResource::COURSE_METADATA_AGGREGATE_RATING => $rating
            )
        );
    }

    /**
     * View a course difficulty
     *
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewDifficultyAction($courseIdentifier)
    {
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        $difficulty = ArrayUtils::getValue(
            $metadatas,
            MetadataResource::COURSE_METADATA_DIFFICULTY
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/Metadata/Component:viewDifficulty.html.twig',
            array(
                MetadataResource::COURSE_METADATA_DIFFICULTY => $difficulty
            )
        );
    }

    /**
     * Edit a course difficulty
     *
     * @param Request      $request          Request
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editDifficultyAction(Request $request, $courseIdentifier)
    {
        $metadataName = MetadataResource::COURSE_METADATA_DIFFICULTY;
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        //FIXME trans
        $form = $this->createFormBuilder($metadatas)
            ->add(
                $metadataName,
                'choice',
                array(
                    'choices'     => array(
                        'easy'   => 'facile',
                        'middle' => 'moyen',
                        'hard'   => 'difficile'
                    ),
                    'empty_value' => '',
                    'required'    => true
                )
            )
            ->getForm();

        $form = $this->processCourseEdit(
            $request,
            $form,
            $courseIdentifier,
            $metadatas,
            $metadataName
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/MetadataByCourse/Component:editDifficulty.html.twig',
            array(
                'courseIdentifier' => $courseIdentifier,
                'form'             => $form->createView()
            )
        );
    }

    /**
     * View a course duration
     *
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewTimeRequiredAction($courseIdentifier)
    {
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );
        $timeRequired = ArrayUtils::getValue(
            $metadatas,
            MetadataResource::COURSE_METADATA_TIME_REQUIRED
        );

        return $this->render(
            'SimpleITClaireAppBundle:Course/Metadata/Component:viewTimeRequired.html.twig',
            array(
                MetadataResource::COURSE_METADATA_TIME_REQUIRED => $timeRequired
            )
        );
    }

    /**
     * Edit a course duration
     *
     * @param Request      $request          Request
     * @param int | string $courseIdentifier Course id | slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editTimeRequiredAction(Request $request, $courseIdentifier)
    {
        $metadataName = MetadataResource::COURSE_METADATA_TIME_REQUIRED;
        $metadatas = $this->get('simple_it.claire.course.metadata')->getAllFromCourse(
            $courseIdentifier
        );

        if (isset($metadatas[$metadataName])) {
            $currentDuration = new \DateInterval($metadatas[$metadataName]);
            $durationUnits = array(
                'days'    => $currentDuration->d,
                'hours'   => $currentDuration->h,
                'minutes' => $currentDuration->i
            );
        } else {
            $currentDuration = new \DateInterval('P0D');
            $durationUnits = array();
        }

        $form = $this->createFormBuilder($durationUnits)
            ->add('days', null, array('required' => false))
            ->add('hours', null, array('required' => false))
            ->add('minutes', null, array('required' => false))
            ->getForm();

        if (RequestUtils::METHOD_POST == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $durationUnits = $form->getData();
                $duration = new \DateInterval('P0D');
                $duration->d = $durationUnits['days'];
                $duration->m = $durationUnits['hours'];
                $duration->i = $durationUnits['minutes'];

                if ($duration != $currentDuration) {
                    $this->get('simple_it.claire.course.metadata')->saveFromCourse(
                        $courseIdentifier,
                        array($metadataName => DateUtils::DateIntervalToString($duration))
                    );
                }
            }
        }

        return $this->render(
            'SimpleITClaireAppBundle:Course/MetadataByCourse/Component:editTimeRequired.html.twig',
            array(
                'courseIdentifier' => $courseIdentifier,
                'form'             => $form->createView()
            )
        );
    }
}
