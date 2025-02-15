<?php

class HomeController extends PageController
{
    public function FeaturedTestimonials()
    {
        return Testimonial::get()
            ->filter(array(
                'FeaturedOnHomepage' => true
            ))
            ->limit(3);
    }
}