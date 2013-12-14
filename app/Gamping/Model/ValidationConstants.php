<?php
namespace Gamping\Model;

class ValidationConstants {
    const PARCEL = 1001;
    const USER   = 1002;
    const ADDRESS = 1003;
    const COMMODITY = 1004;
    const ACTIVITY = 1005;
    const COUNTRY = 1006;
    const CURRENCY = 1007;
    const PARCEL_HAS_ACTIVITY = 1008;
    const PARCEL_HAS_COMMODITY = 1009;
    const PARCEL_HAS_PICTURE = 1010;
    const PARCEL_HAS_SITUATION_GEO = 1011;
    const PICTURE = 1012;
    const REGION = 1013;
    const SITUATION_GEO = 1014;

    public static function generate($baseCode, $code) {
        return $baseCode . $code;
    }

    public static function is($fullCode, $value) {

    }
}