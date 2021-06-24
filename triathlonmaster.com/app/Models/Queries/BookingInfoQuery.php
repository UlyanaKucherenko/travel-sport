<?php


namespace App\Models\Queries;


use App\Models\LocationPrice;
use App\Models\OrderItem;
use App\Models\Training;

class BookingInfoQuery
{
    public function queryPrices($today)
    {
        $prices = Training::query()
            ->whereTwoWeeks($today)
            ->get();

        $info = [];

        foreach ($prices as $price) {
            $locationId = $price->location_id;

            if (!isset($info[$locationId])) {
                $info[$locationId] = [];
            }

            $info[$locationId][] = [
                'price' => $price->price,
                'day' => $price->date,
                'time' => $price->time,
            ];
        }

        return collect($info);
    }

    public function query($today, $byTime = true)
    {
        $bookings = Training::query()
            ->whereThreeYears($today)
            ->get(['date', 'time', 'booked_by']);

        $result = [];
        $times = [8, 10, 12, 14, 16, 18, 20, 22, 0];
        foreach ($times as $time) {
            $result[$time] = [];
        }
        foreach ($bookings as $item) {
            if ($byTime) {
                $result[$item->time][$item->date] = $item->booked_by;
            } else {
                $result[$item->date][$item->time] = $item->booked_by;
            }
        }
        return collect($result);
    }

    protected function merge($prices, $items)
    {
        $info = [];

        /** @var LocationPrice $price */
        foreach ($prices as $price) {
            $locationSlug = $price->location->slug;
            $time = $price->time;
            $date = $price->date;

            if (!isset($info[$locationSlug])) {
                $info[$locationSlug] = [];
            }

            if (!isset($info[$locationSlug][$time])) {
                $info[$locationSlug][$time] = [];
            }

            $info[$locationSlug][$time][$date] = [
                'price' => $price->price,
                'reserved' => 0,
            ];
        }

        foreach ($items as $item) {
            if (!$item->order->isCanceled()) {
                $locationSlug = $item->location->slug;
                $time = $item->time;
                $date = $item->date;

                if (!isset($info[$locationSlug])) {
                    $info[$locationSlug] = [];
                }

                if (!isset($info[$locationSlug][$time])) {
                    $info[$locationSlug][$time] = [];
                }


                if (isset($info[$locationSlug][$time][$date])) {
                    $info[$locationSlug][$time][$date]['reserved'] = 1;
                } else {
                    $info[$locationSlug][$time][$date] = [
                        'price' => null,
                        'reserved' => 1,
                    ];
                }
            }
        }

        return $info;
    }
}
