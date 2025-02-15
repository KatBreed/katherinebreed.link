<?php
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;

class ProfilePage extends Page

{
	private static $has_one = [
		'Photo' => Image::class,
	];	
	
	private static $owns = [
		'Photo',
	];

	// Add a photo upload field
    public function getCMSFields() {
        $fields = parent::getCMSFields();
		
		$photoField = UploadField::create('Photo', 'Upload a Photo');
		$photoField->setFolderName('Profile Photos'); // Add photo to designated folder
		$photoField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']); // Only allow these filetypes
		$fields->addFieldToTab('Root.Attachments', $photoField); // Add tab for the photo field

        return $fields;   
	}
	
}