<?php
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DatalObject;

class Testimonials extends Page
{
    private static $db = [];

    private static $has_many = [
        'Testimonials' => Testimonial::class,
    ];

    public function getTestimonialsList()
    {
        return Testimonial::get()->sort('Created','DESC');
    }
}