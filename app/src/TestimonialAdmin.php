<?php
use SilverStripe\Admin\ModelAdmin;

class TestimonialAdmin extends ModelAdmin
{
	private static $menu_title = 'Testimonials';
	private static $url_segment = 'testimonials';
	private static $managed_models = [
		Testimonial::class,
	];

	// Adjust the position of the Testimonials icon in the menu
	private static $menu_priority = 4;
}