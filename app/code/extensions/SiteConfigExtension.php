<?php

namespace App\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends DataExtension
{
    // Create the fields in the database
    private static $db = [
        'CompanyName' => 'Varchar(255)',
        'PhoneNumber' => 'Varchar (20)',
        'EmailAddress' => 'Varchar(255)',
        'InstagramURL' => 'Varchar(255)',
        'CopyrightStatement' => 'Varchar(255)',
        'DesignAuthor' => 'Varchar(255)',
    ];

    // Add the fields to the CMS FieldList
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('CompanyName', 'Company Name'),
            TextField::create('PhoneNumber', 'Phone Number'),
            TextField::create('EmailAddress', 'Email Address'),
            TextField::create('InstagramURL', 'Instagram URL'),
            TextField::create('CopyrightStatement', 'Copyright Statement'),
            TextField::create('DesignAuthor', 'Design By')
        ]);
    }
}