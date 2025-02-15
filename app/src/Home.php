<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Home extends Page

{
	private static $has_one = [
		'Photo' => Image::class,
	];	
	
	private static $owns = [
		'Photo',
	];

    // Add a upload photo field
    public function getCMSFields() 
	{
        $fields = parent::getCMSFields();
		
		$photoField = UploadField::create('Photo', 'Upload a banner image');
		$photoField->setFolderName('General Photos'); // Upload to deisgnated folder
        $photoField->getValidator()->setAllowedExtensions(['png', 'gif', 'jpeg', 'jpg',]); // Only allow these filetypes
		$fields->addFieldToTab('Root.Attachments', $photoField); // Create a tab for the photo field
		
           return $fields;
    }
	
    // Get the profiles from the profile pages and display them on the home page
	public function getProfiles() {
        $whoWeArePage = Page::get()->filter('Title', 'Who We Are')->first();
        if ($whoWeArePage) {
            return ProfilePage::get()->filter('ParentID', $whoWeArePage->ID);
        }
        return [];
    }
}
