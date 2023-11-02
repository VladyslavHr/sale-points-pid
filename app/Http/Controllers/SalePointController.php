<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{OpenHour, SalePoint};
use Carbon\Carbon;

class SalePointController extends Controller
{
    public function index(Request $request) {
        $currentDateTime = Carbon::now();

        $currentFormattedTime = $currentDateTime->format('H:i');
        $currentTimeInSeconds = strtotime($currentFormattedTime);

        $currentDayOfWeek = $currentDateTime->dayOfWeek;

        $openSalePoints = [];

        $salePoints = SalePoint::get();

        if ($request->has('chooseDateTime')) {

            $chooseDateTime = Carbon::parse($request->input('chooseDateTime'));
            $dayOfWeek = $chooseDateTime->dayOfWeek;
            $timeOnly = $chooseDateTime->format('H:i');
            $timeOnlyInSeconds = strtotime($timeOnly);

            $salePoints = SalePoint::with(['open_hours' => function ($query) use ($dayOfWeek) {
                $query->where('day_from', '<=', $dayOfWeek)->where('day_to', '>=', $dayOfWeek);
            }])->get();

            $filteredSalePoints = [];
            foreach ($salePoints as $point) {
                foreach ($point->open_hours as $openHour) {
                    $intervals = explode(',', $openHour->hours);
                    foreach ($intervals as $interval) {
                        $pre_times = str_replace('–', '-', $interval);
                        $times = explode('-', $pre_times);
                        $startTime = strtotime($times[0]);
                        $endTime = strtotime($times[1]);
                        if ($timeOnlyInSeconds >= $startTime && $timeOnlyInSeconds <= $endTime) {
                            $filteredSalePoints[] = $point;
                            break;
                        }
                    }
                }
            }
            $salePoints = $filteredSalePoints;
        }

        if ($request->has('chekOpenPoints')) {
            $salePoints = SalePoint::with(['open_hours' => function ($query) use ($currentDayOfWeek) {
                $query->where('day_from', '<=', $currentDayOfWeek)->where('day_to', '>=', $currentDayOfWeek);
            }])->get();

            $filteredSalePoints = [];
            foreach ($salePoints as $point) {
                foreach ($point->open_hours as $openHour) {
                    $intervals = explode(',', $openHour->hours);
                    foreach ($intervals as $interval) {
                        $pre_times = str_replace('–', '-', $interval);
                        $times = explode('-', $pre_times);
                        $startTime = strtotime($times[0]);
                        $endTime = strtotime($times[1]);
                        if ($currentTimeInSeconds >= $startTime && $currentTimeInSeconds <= $endTime) {
                            $filteredSalePoints[] = $point;
                            break;
                        }
                    }
                }
            }
            $salePoints = $filteredSalePoints;
        }

        return view('salePoints.index', [
            'salePoints' => $salePoints,
            'currentFormattedTime' => $currentFormattedTime,
        ]);
    }

    public function openPointsApi(Request $request) {
        $currentDateTime = Carbon::now();

        $currentFormattedTime = $currentDateTime->format('H:i');
        $currentTimeInSeconds = strtotime($currentFormattedTime);

        $currentDayOfWeek = $currentDateTime->dayOfWeek;

        $openSalePoints = [];

        $salePoints = SalePoint::get();

        if ($request->has('chooseDateTime')) {

            $chooseDateTime = Carbon::parse($request->input('chooseDateTime'));
            $dayOfWeek = $chooseDateTime->dayOfWeek;
            $timeOnly = $chooseDateTime->format('H:i');
            $timeOnlyInSeconds = strtotime($timeOnly);

            $salePoints = SalePoint::with(['open_hours' => function ($query) use ($dayOfWeek) {
                $query->where('day_from', '<=', $dayOfWeek)->where('day_to', '>=', $dayOfWeek);
            }])->get();

            $filteredSalePoints = [];
            foreach ($salePoints as $point) {
                foreach ($point->open_hours as $openHour) {
                    $intervals = explode(',', $openHour->hours);
                    foreach ($intervals as $interval) {
                        $pre_times = str_replace('–', '-', $interval);
                        $times = explode('-', $pre_times);
                        $startTime = strtotime($times[0]);
                        $endTime = strtotime($times[1]);
                        if ($timeOnlyInSeconds >= $startTime && $timeOnlyInSeconds <= $endTime) {
                            $filteredSalePoints[] = $point;
                            break;
                        }
                    }
                }
            }
            $salePoints = $filteredSalePoints;
        }

        if ($request->has('chekOpenPoints')) {
            $salePoints = SalePoint::with(['open_hours' => function ($query) use ($currentDayOfWeek) {
                $query->where('day_from', '<=', $currentDayOfWeek)->where('day_to', '>=', $currentDayOfWeek);
            }])->get();

            $filteredSalePoints = [];
            foreach ($salePoints as $point) {
                foreach ($point->open_hours as $openHour) {
                    $intervals = explode(',', $openHour->hours);
                    foreach ($intervals as $interval) {
                        $pre_times = str_replace('–', '-', $interval);
                        $times = explode('-', $pre_times);
                        $startTime = strtotime($times[0]);
                        $endTime = strtotime($times[1]);
                        if ($currentTimeInSeconds >= $startTime && $currentTimeInSeconds <= $endTime) {
                            $filteredSalePoints[] = $point;
                            break;
                        }
                    }
                }
            }
            $salePoints = $filteredSalePoints;
        }

        return response()->json([
            'status' => 'ok',
            'salePoints' => $salePoints,
        ], 200, [], 128);
    }
}
