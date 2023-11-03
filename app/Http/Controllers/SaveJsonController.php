<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{OpenHour, SalePoint};

class SaveJsonController extends Controller
{
    public function saveJsonLocally() {
        $url = 'https://data.pid.cz/pointsOfSale/json/pointsOfSale.json';
        $jsonData = file_get_contents($url);
        $filePath = public_path('pointsOfSale.json');
        file_put_contents($filePath, $jsonData);

        return 'Soubor JSON byl úspěšně uložen ve vašem projektu.';
    }

    public function saveJsonToDatabase()
    {
        $this->saveJsonLocally();
        $filePath = public_path('pointsOfSale.json');
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);

        foreach ($data as $item) {
            $salePoint = SalePoint::updateOrCreate(
                ['sale_point' => $item['id']],
                [
                    'type' => $item['type'],
                    'name' => $item['name'],
                    'address' => $item['address'] ?? null,
                    'lat' => $item['lat'],
                    'lon' => $item['lon'],
                    'services' => $item['services'],
                    'pay_methods' => $item['payMethods'],
                    'link' => isset($item['link']) ? $item['link'] : ''
                ]
            );

            foreach ($item['openingHours'] as $openingHour) {
                OpenHour::updateOrCreate(
                    [
                        'sale_point_id' => $salePoint->id ? : '',
                        'day_from' => $openingHour['from'],
                        'day_to' => $openingHour['to'],
                        'hours' => $openingHour['hours'],
                    ],
                );
            }
        }

        return 'Data byla úspěšně uložena do databáze.';
    }

    public function saveJsonToDatabaseApi(){
        $this->saveJsonLocally();

        $filePath = public_path('pointsOfSale.json');
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);

        foreach ($data as $item) {
            $salePoint = SalePoint::updateOrCreate(
                ['sale_point' => $item['id']],
                [
                    'type' => $item['type'],
                    'name' => $item['name'],
                    'address' => $item['address'] ?? null,
                    'lat' => $item['lat'],
                    'lon' => $item['lon'],
                    'services' => $item['services'],
                    'pay_methods' => $item['payMethods'],
                    'link' => isset($item['link']) ? $item['link'] : ''
                ]
            );

            foreach ($item['openingHours'] as $openingHour) {
                OpenHour::updateOrCreate(
                    [
                        'sale_point_id' => $salePoint->id ? : '',
                        'day_from' => $openingHour['from'],
                        'day_to' => $openingHour['to'],
                        'hours' => $openingHour['hours'],
                    ],
                );
            }
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Data byla úspěšně uložena do databáze.',
        ], 200, [], 128);

    }

}
