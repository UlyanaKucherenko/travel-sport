<?php


namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class AdminUnsubscribe
{
    public function sendUnsubscribeRequest($user)
    {
        if(!empty($user->orderId)){
            $query = [
                'order' => $user->orderId,
                'email' => $user->email,
                'host' => request()->getHost(),
                'name' => $user->first_name . ' ' . $user->last_name,
            ];

            $host = config('admin.host');
            try {
                $client = new Client([
                    'track_redirects' => false,
                ]);
                $result = $client->request('POST', $host . '/api/unsubscribe_product', [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'form_params' => $query
                ]);
                return json_decode($result->getBody() ->getContents());
            } catch (RequestException $exception) {
                return response()->json(['error' => $exception->getMessage()], 403);
            } catch (GuzzleException $e) {
                return response()->json(['error' => $e->getMessage()], 403);
            }
        }else{
            return response()->json(['error' => 'order id not found'], 403);
        }
    }
}