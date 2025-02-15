<?php
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CurrencyField;

class HeroInstrument extends Page
{		

	private static $has_one = [
		'Photo' => Image::class,
	];	
	
	private static $owns = [
		'Photo',
	];
	
	// Add Price and Luthier fields in the CMS
	private static $db = [
		'Price' => 'Currency',
		'Luthier' => 'Varchar(255)',
	];

	// Add fields to the CMS
    public function getCMSFields() {
        $fields = parent::getCMSFields();
		$photoField = UploadField::create('Photo', 'Instrument Photo');
		$photoField->setFolderName('Instrument Photos'); // Upload to designated folder
		$photoField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']); // Only allow these extensions
        $fields->addFieldToTab('Root.Attachments', $photoField); // Add a tab for the photo field
		$fields->addFieldToTab('Root.Main', CurrencyField::create('Price', 'Price')); // Add the Price field to the main tab
		$fields->addFieldToTab('Root.Main', TextField::create('Luthier', 'Luthier')); // Add the Luthier field to the main tav

           return $fields;   
	}

	// Produce thumbnails from each HeroInstrumnet on InstrumentType
	public function getThumbnail() {
		if ($this->Photo()->exists()) {
			return $this->Photo()->ScaleWidth(250);
		}
		return null;
    }

	// Customise Price
	public function getFormattedPrice() {
		return $this->Price ? number_format($this->Price, 0)  : null;
	}
}