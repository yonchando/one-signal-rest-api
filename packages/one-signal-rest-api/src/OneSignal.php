<?php


namespace Chando\OneSignalRestApi;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class OneSignal
{
    private $API_KEY;
    private $APP_ID;
    private $BASE_URL;

    public $content;
    public $headerTitle;
    public $playerIds;
    public $data;
    public $errors;
    public $body;
    public $response;
    private $AUTH_KEY;

    public function __construct($API_KEY, $APP_ID, $AUTH_KEY, $BASE_URL)
    {
        $this->API_KEY = $API_KEY;
        $this->APP_ID = $APP_ID;
        $this->BASE_URL = $BASE_URL;
        $this->AUTH_KEY = $AUTH_KEY;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $headerTitle
     */
    public function setHeaderTitle($headerTitle)
    {
        $this->headerTitle = $headerTitle;
        return $this;
    }

    /**
     * @param mixed $playerIds
     */
    public function setPlayerIds($playerIds)
    {
        $this->playerIds = $playerIds;
        return $this;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function httpRequest(string $url, string $method, string $auth, array $json = [])
    {
        $client = new Client();
        try {
            $res = $client->request($method, $url, [
                'headers' => [
                    'Content-Type: application/json; charset=utf-8',
                    "Authorization: Basic {$auth}",
                ],
                'json'    => $json,
            ]);
            if ($res->getStatusCode()) {
                $this->body = json_decode($res->getBody(), true);
            }
        } catch (ClientException $e) {
            $this->errors['errors']['exception'] = (json_decode($e->getResponse()->getBody(), true))['errors'];
        }
        return $this;
    }

    public function viewApp()
    {
        if (empty($this->AUTH_KEY)) {
            $this->errors['errors']['auth_key'] = [
                'Please add AUTH_KEY in your env file.',
            ];
        }else {
            $url = "$this->BASE_URL/apps";
            $this->response = $this->httpRequest($url, 'GET', $this->AUTH_KEY);
        }
        return $this;
    }

    public function sendNotification()
    {
        if (empty($this->API_KEY)) {
            $this->errors['errors']['auth_key'] = [
                'Please add API_KEY in your env file.',
            ];
        }else {
            $url = "$this->BASE_URL/notifications";
            $data = [
                'app_id'             => env('ONE_SIGNAL_APP_ID'),
                'data'               => $this->data,
                'contents'           => [
                    'en' => $this->content,
                ],
                'headings'           => [
                    'en' => $this->headerTitle,
                ],
                'content_available'  => true,
            ];
            $this->response = $this->httpRequest($url, 'POST', $this->API_KEY, $data);
        }
        return $this;
    }

    public function hasError()
    {
        if (!empty($this->errors)) {
            return true;
        }
        return false;
    }
}