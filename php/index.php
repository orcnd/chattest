<?php
require 'config.php';
//loading dependencies
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$app = new FrameworkX\App();

//routing
$app->get('/api/', function () {
    return React\Http\Message\Response::plaintext(
        'no direct access allowed'
    );
});

//get All
$app->get('/api/messages', function () {
    return React\Http\Message\Response::json(
        Capsule::table('messages')->orderByDesc('id')->get(),
    );
});

//get Everything
$app->get('/api/messages/{id}', function (Psr\Http\Message\ServerRequestInterface $request) {
    $id = $request->getAttribute('id');

    $data = Capsule::table('messages')->where('id', $id)->first();
    return React\Http\Message\Response::json($data);
});

//insert new
$app->post('/api/messages', function (Psr\Http\Message\ServerRequestInterface $request) {
    $data = $request->getParsedBody();

    $insertData = [
        'channel' => $data['channel'],
        'message' => $data['message'],
        'sender' => $data['sender'],
        'created_at' => date('Y-m-d H:i:s')
    ];

    //insert the data above and return the inserted id
    $insertedId = Capsule::table('messages')->insertGetId($insertData);

    $response = [
        'result' => 'success',
        'inserted_id' => $insertedId
    ];
    return React\Http\Message\Response::json($response);
});

//delete
$app->delete('/api/messages/{id}', function (Psr\Http\Message\ServerRequestInterface $request) {
    $id = $request->getAttribute('id');

    //delete from db
    Capsule::table('messages')->where('id', $id)->delete();

    $response = [
        'result' => 'success',
    ];
    return React\Http\Message\Response::json($response);
});

//update
$app->post('/api/messages/{id}', function (Psr\Http\Message\ServerRequestInterface $request) {
    $data = $request->getParsedBody();
    $id = $request->getAttribute('id');

    //gather info
    $updateData = [
        'channel' => $data['channel'],
        'message' => $data['message'],
        'sender' => $data['sender'],
    ];

    //find and update
    Capsule::table('messages')->where('id', $id)->update($updateData);

    $response = [
        'result' => 'success'
    ];
    return React\Http\Message\Response::json($response);
});

//needed to app run
$app->run();