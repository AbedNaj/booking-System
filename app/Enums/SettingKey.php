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


        // booking settings

    case CancelHours = 'cancel_hours';
    case CancelFees = 'cancel_fees';
    case cancelPolicy = 'cancel_policy';
    case workingFrom = 'working_from';
    case workingTo = 'working_to';
    case allowCancel = 'allow_cancel';


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
            self::projectDesc => 'page_texts',

            self::CancelHours,
            self::CancelFees,
            self::cancelPolicy,
            self::workingFrom,
            self::workingTo,
            self::allowCancel => 'booking',
        };
    }
}
