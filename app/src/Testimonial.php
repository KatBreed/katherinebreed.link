<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TabSet;

class Testimonial extends DataObject
{
	// Add fields to the database
	private static $db = [
		'Title' => 'Varchar',
		'Description' => 'Text',
		'FeaturedOnHomepage' => 'Boolean',
	];
	
	private static $summary_fields = [
		'Title' => 'Title',
		'Description' => 'Description',
		'FeaturedOnHomepage.Nice' => 'Featured?'
	];		

	// Add fields to the CMS
    public function getCMSFields() 
	{
        $fields = FieldList::create(TabSet::create('Root'));
		$fields->addFieldsToTab('Root.Main', [
			TextField::create('Title'),
			TextareaField::create('Description'),
			CheckboxField::create('FeaturedOnHomepage', 'Feature on Homepage')
		]);

           return $fields;
    }
}
