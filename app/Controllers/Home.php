<?php

namespace App\Controllers;

class Home extends BaseController
{
    public const SUCCESS_RESPONSE = 200;

    public function index()
    {
        return view('booking');
    }

    public function airports()
    {
        $request = \Config\Services::request();
        $response = [];
        $response['result'] = true;
        $response['airports'] = [];

        $curlRequest = curl_init();
        $tokenApiUrl = 'https://www.kayak.com/a/api/smarty/nearby';
        curl_setopt($curlRequest, CURLOPT_URL, $tokenApiUrl);
        curl_setopt($curlRequest, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, false);

        $code = $request->getVar('code');
        $postParams = "code=$code";

        curl_setopt($curlRequest, CURLOPT_POSTFIELDS, $postParams);

        $curlResponse = json_decode(curl_exec($curlRequest), true);
        $httpCode = curl_getinfo($curlRequest, CURLINFO_RESPONSE_CODE);
        if ($httpCode === self::SUCCESS_RESPONSE) {
            if (!empty($curlResponse) && is_array($curlResponse)) {
                foreach ($curlResponse as $airport) {
                    $response['airports'][] = [
                        'code' => $airport['ap'],
                        'name' => $airport['shortdisplayname'],
                    ];
                }
            }
        }

        echo json_encode($response);
    }

    public function searchflyings()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect();

        $post = json_decode($request->getBody());

        $where = [];

        if (!empty($post->origen)) {
            $origenAirport = $db->escape($post->origen);
            $where[] = "t.origin_airport = $origenAirport";
        }

        if (!empty($post->destiny)) {
            $destinyAirport = $db->escape($post->destiny);
            $where[] = "t.destiny_airport = $destinyAirport";
        }

        if (!empty($post->begin_date)) {
            $beginDate = $db->escape($post->begin_date);
            $where[] = "t.begin_date >= $beginDate";
        }

        if (!empty($post->end_date)) {
            $endDate = $db->escape($post->end_date);
            $where[] = "t.end_date <= $endDate";
        }

        $whereConditions = !empty($where)
            ? ' WHERE ' . implode('AND', $where)
            : '';

        $sql = "
            SELECT
                t.id, t.begin_at, t.end_at, t.cabin_class, t.fly_cost,
                t.airline, t.return_begin_at, t.return_end_at
            FROM
                flying t
            $whereConditions
        ";

        $flyList = $db->query($sql)->getResultArray();

        $response = [];
        $response['result'] = true;
        $response['flys'] = $flyList;
        echo json_encode($response);
    }
}
