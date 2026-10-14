<?php
$player = $_GET['player'] ?? null;
$state = json_decode(file_get_contents('state.json'), true);

if (!$player || !isset($state['players'][$player])) {
    echo json_encode(['error'=>'invalid player']);
    exit;
}

echo json_encode([
    'status'   => $state['status'],
    'players'  => $state['players'],
    'deck_count' => count($state['deck']),
    'turn'     => $state['turn'],
    'log'      => $state['log'],
    'pending'  => $state['pending'] ?? null
]);

?>
