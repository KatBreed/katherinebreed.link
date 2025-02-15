<?php
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use SilverStripe\Forms\FieldList;

class Instrument extends Page

{	
	private static $has_many = [
		'InstrumentObjects' => InstrumentObject::class,
	];
	private static $has_one = [
		'Photo' => Image::class,
	];	
	
	private static $owns = [
		'Photo',
	];

	// Add fields to the CMS
	public function getCMSFields(): FieldList
	{
        $fields = parent::getCMSFields();

		$photoField = UploadField::create('Photo', 'Instrument Photo');
		$photoField->setFolderName('Instrument Photos'); // Upload to designated folder
		$photoField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif']); // Only allow these filetypes
        $fields->addFieldToTab('Root.Attachments', $photoField); // Create a tab for the photo field

		// Add ordering capability to move the rows around
		$gridFieldConfig = GridFieldConfig_RecordEditor::create()
			->addComponent(new GridFieldOrderableRows('SortOrder'));

		$gridField = GridField::create(
			'InstrumentObjects',
			'Instruments',
			$this->InstrumentObjects()->sort('SortOrder'),
			$gridFieldConfig
		);

		// Customise the label of the +Add button
		$gridField->getConfig()->getComponentByType(GridFieldAddNewButton::class)
			->setButtonName('Add Instrument');

			$fields->addFieldToTab('Root.Instruments', $gridField);
		
			return $fields;
	}
}