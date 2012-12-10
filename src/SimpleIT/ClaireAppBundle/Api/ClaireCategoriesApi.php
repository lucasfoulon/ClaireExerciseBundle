<?php
namespace SimpleIT\ClaireAppBundle\Api;

use Symfony\Component\HttpFoundation\Request;
use SimpleIT\ClaireAppBundle\Api\ClaireApi;

/**
 * Claire categories api
 */
class ClaireCategoriesApi extends ClaireApi
{
    const categories = '/categories/';
    const tags = '/tags/';

    /**
     * Get categories
     */
    public function prepareCategories()
    {
        $this->responses['categories'] = $this->getTransportService()->get(self::categories, array(
            'Accept' => 'application/json',
            'Range' => 'items=0-49'));
    }

    /**
     * Get a category from slug
     *
     * @param string $categorySlug Slug
     */
    public function prepareCategory($categorySlug)
    {
        $this->responses['category'] = $this->getTransportService()->get(
            self::categories.$categorySlug,
            array('Accept' => 'application/json')
        );
    }

    /**
     * Get tags from category slug
     *
     * @param string $categorySlug Slug
     */
    public function prepareTags($categorySlug)
    {
        $this->responses['tags'] = $this->getTransportService()->get(
            self::categories.$categorySlug.self::tags,
            array('Accept' => 'application/json')
        );
    }

    /**
     * Get associated tags for this tag
     *
     * @param string $categorySlug Slug
     */
    public function prepareAssociatedTags($categorySlug, $tagSlug)
    {
        $this->responses['tags'] = $this->getTransportService()->get(
            self::categories.$categorySlug.self::tags.$tagSlug.'/associated-tags',
            array('Accept' => 'application/json')
        );
    }

    /**
     * Get single tag from category and tag slug
     *
     * @param string $categorySlug Slug
     */
    public function prepareTag($categorySlug, $tagSlug)
    {
        $this->responses['tag'] = $this->getTransportService()->get(
            self::categories.$categorySlug.self::tags.$tagSlug,
            array('Accept' => 'application/json')
        );
    }

}