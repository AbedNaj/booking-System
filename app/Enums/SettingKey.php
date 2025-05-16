<?php

namespace App\Enums;

enum SettingKey: String
{

    // general settings
    case siteName = "site_name";
    case siteEmail = "site_email";
    case sitePhone = "site_phone";
    case siteAddress = "site_address";

        // logo

    case Logo = "site_logo";

        // page_texts

    case mainHeading = "site_main_heading";
    case subHeading = "site_sub_heading";
    case projectDesc = "site_project_desc";

    public function group(): string
    {
        return match ($this) {
            self::siteName,
            self::siteEmail,
            self::sitePhone,
            self::siteAddress => 'general',

            self::Logo => 'logo',

            self::mainHeading,
            self::subHeading,
            self::projectDesc => 'page_texts'
        };
    }
}
