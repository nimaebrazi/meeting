<?php

namespace Meeting;

use DatePeriod;
use DateTime;

class Util
{
    public static function getTiming(): array
    {
        $timing = [];

        $start = new DateTime('2010-05-01');
        $end = new DateTime('2010-05-02');

        $interval = \DateInterval::createFromDateString('30 minute');
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            $timing[] = $dt->format("H:i");
        }

        return $timing;
    }

    public static function getWeekDays()
    {
        $days = [];

        $today = new DateTime('Asia/Tehran');
        $interval = new \DateInterval('P1D');
        for ($i = 1; $i <= 7; $i++) {
            $days[] = $today->format('D,d');
            $today = $today->add($interval);
        }

        return $days;
    }
}