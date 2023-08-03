<?php

namespace App\DTOs\Binance\Enum;
/**
 * s-> seconds; m -> minutes; h -> hours; d -> days; w -> weeks; M -> months
 */
enum IntervalEnum: string
{
    case OneSecond = '1s';
    case OneMinute = '1m';
    case ThreeMinutes = '3m';
    case FiveMinutes = '5m';
    case FifteenMinutes = '15m';
    case ThirtyMinutes = '30m';
    case OneHour = '1h';
    case TwoHours = '2h';
    case FourHours = '4h';
    case SixHours = '6h';
    case EightHours = '8h';
    case TwelveHours = '12h';
    case OneDay = '1d';
    case ThreeDays = '3d';
    case OneWeek = '1w';
    case OneMonth = '1M';
}
