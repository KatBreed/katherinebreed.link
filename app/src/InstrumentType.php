<?php
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
class InstrumentType extends Page
{	
	// Indicate relationship
	private static $has_many = [
		'Children' => HeroInstrument::class,
	];
	
	private static $has_one = [
		'Photo' => Image::class,
	];	
	
	private static $owns = [
		'Photo',
	];
	
	// Add a photo upload field
	public function getCMSFields() {
        $fields = parent::getCMSFields();

		$photoField = UploadField::create('Photo', 'Instrument Photo');
		$photoField->setFolderName('Instrument Photos'); // Upload photos to designated folder
		$photoField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']); // Only allow certain filetypes
        
		$fields->addFieldToTab('Root.Attachments', $photoField); // Create a tab for the photo field
		
			return $fields;
	}
	
	// Get the photo from the child page type 'HeroInstrument'.
	public function getThumbnail() {
		return $this->Photo()->exists() ? $this->Photo()->ScaleWidth(250) : null;
	}
	public function getChildThumbnails() {
		return $this->Children()->filter('ClassName', HeroInstrument::class);
    }
}