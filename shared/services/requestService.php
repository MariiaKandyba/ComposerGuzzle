<?php


use GuzzleHttp\Client;

class RequestService
{
    private $client;
    private $apiUrl;

    public function __construct($apiUrl)
    {
        $this->client = new Client();
        $this->apiUrl = $apiUrl;
    }

    public function getAllEntities()
    {
        $response = $this->client->request('GET', $this->apiUrl);
        $responseBody = $response->getBody();
        $data = $responseBody->getContents();
        return  $data;
    }
    public function getEntityById($id)
    {
        $response = $this->client->request('GET', $this->apiUrl . "/" . $id);
        $responseBody = $response->getBody();
        $data = $responseBody->getContents();
        return  $data;
    }
    public function createEntity($entityData)
    {
        try {
            $response = $this->client->request('POST', $this->apiUrl, [
                'json' => $entityData
            ]);

            $responseBody = $response->getBody();
            $data = $responseBody->getContents();
            return $data;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function updateEntity($id, $entityData)
    {
        echo $id;
        try {
            $response = $this->client->request('PUT', $this->apiUrl . '/' . $id, [
                'json' => $entityData
            ]);

            $responseBody = $response->getBody();
            $data = $responseBody->getContents();
            return $data;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    public function deleteEntity($id)
    {
        try {
            $response = $this->client->request('DELETE', $this->apiUrl . '/' . $id);
            $statusCode = $response->getStatusCode();
            return $statusCode == 204;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
