<?php

$data = [];

foreach (['master', 'rc', 'stable', 'oldstable'] as $type) {
    $version = $TPL->version($type);
    if(!$version) continue;
    $version = htmlspecialchars_decode($version);

    [$date, $name] = explode(' ', $version, 2);
    $name = trim($name, '"');

    $data[$type] = [
        'version' => $version,
        'date' => $date,
        'name' => $name,
        'type' => $type,
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
