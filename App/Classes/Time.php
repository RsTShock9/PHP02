<?php

namespace App\Classes;

use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Timer\ResourceUsageFormatter;

class Time
{
    public function getData()
    {
        $timer = new Timer;
        $timer->start();
        $time = $timer->stop();
        var_dump($time);

        foreach (\range(0, 100000) as $i) {
            $i = 1;
        }

        echo (new ResourceUsageFormatter())->resourceUsage($timer->stop());
    }
}
