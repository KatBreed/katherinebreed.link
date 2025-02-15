<?php
use SilverStripe\CMS\Model\SiteTree;
class MainProfilePage extends Page

{
    public function getProfiles()
    {
        return ProfilePage::get();
    }
}