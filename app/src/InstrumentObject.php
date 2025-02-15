<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;

class InstrumentObject extends DataObject

{
    private static $db = [
        'Name' => 'Varchar(255)',
        'SortOrder' => 'Int',
    ];

    private static $default_sort = 'SortOrder';

    private static $has_one = [
        'Instrument' => Instrument::class,
        'ParentPage' => InstrumentType::class,
        'HeroInstrument' => HeroInstrument::class,
    ];
    
    public function getCMSFields(): FieldList
    {
        $fields = FieldList::create();

        // Add a name field
        $nameField = TextField::create('Name', 'Instrument Name');
        $fields->add($nameField);

        // Add a dropdown to select the page to link to
        $parentPageField = DropdownField::create(
            'ParentPageID', 
            'Page to link to', 
            InstrumentType::get()->map('ID', 'Title')
        )->setEmptyString('(Select page to link to)');
        $fields->add($parentPageField);

        //Add a dropdown to select a photo
        $photoField = DropdownField::create(
            'HeroInstrumentID',
            'Select Hero Instrument',
            HeroInstrument::get()->map('ID','Title')
                )->setEmptyString('(Select Hero Instrument)');
        $fields->add($photoField);
        
        return $fields;
    }
    
    // Link to parent page
    public function Link()
    {
        return $this->ParentPageID ? $this->ParentPage()->Link() :'/';
    }

    // Get the URL of the photo
    public function getPhotoURL()
    {
        return $this->HeroInstrument()->Photo()->exists() ? $this->HeroInstrument()->Photo()->getURL() : null;
    }
}