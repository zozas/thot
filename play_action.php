<?php
$action = $_POST['action'] ?? null;
$state = json_decode(file_get_contents('state.json'), true);

function buildDeck() {
    return [
        ['id'=>1,'name'=>'Betony','group'=>'Tinkering','sub'=>'Defend','value'=>1, 'image'=>'001.png'],
        ['id'=>2,'name'=>'Lovage','group'=>'Tinkering','sub'=>'Defend','value'=>1, 'image'=>'002.png'],
        ['id'=>3,'name'=>'Lady\'s mantle','group'=>'Tinkering','sub'=>'Defend','value'=>1, 'image'=>'003.png'],
        ['id'=>4,'name'=>'Morning dew','group'=>'Tinkering','sub'=>'Defend','value'=>1, 'image'=>'004.png'],
        ['id'=>5,'name'=>'Dandruff','group'=>'Tinkering','sub'=>'Defend','value'=>1, 'image'=>'005.png'],
        ['id'=>6,'name'=>'Liver of sulfur','group'=>'Brewery','sub'=>'Influence','value'=>2, 'image'=>'006.png'],
        ['id'=>7,'name'=>'Moonstone','group'=>'Brewery','sub'=>'Influence','value'=>2, 'image'=>'007.png'],
        ['id'=>8,'name'=>'Olibanum','group'=>'Brewery','sub'=>'Influence','value'=>2, 'image'=>'008.png'],
        ['id'=>9,'name'=>'Caterpillar','group'=>'Brewery','sub'=>'Influence','value'=>2, 'image'=>'009.png'],
        ['id'=>10,'name'=>'Ammoniacum','group'=>'Brewery','sub'=>'Influence','value'=>2, 'image'=>'010.png'],
        ['id'=>11,'name'=>'Gillyweed','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'011.png'],
        ['id'=>12,'name'=>'Cinnamon','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'012.png'],
        ['id'=>13,'name'=>'Mint','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'013.png'],
        ['id'=>14,'name'=>'Daisy','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'014.png'],
        ['id'=>15,'name'=>'Nettle','group'=>'Herbalism','sub'=>'Cure','value'=>2, 'image'=>'015.png'],
        ['id'=>16,'name'=>'Jewelweed','group'=>'Herbalism','sub'=>'Cure','value'=>2, 'image'=>'016.png'],
        ['id'=>17,'name'=>'Cassius purple','group'=>'Herbalism','sub'=>'Cure','value'=>2, 'image'=>'017.png'],
        ['id'=>18,'name'=>'Onion juice','group'=>'Herbalism','sub'=>'Cure','value'=>2, 'image'=>'018.png'],
        ['id'=>19,'name'=>'Mushroom','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'019.png'],
        ['id'=>20,'name'=>'Moondew','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'020.png'],
        ['id'=>21,'name'=>'Asphodel','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'021.png'],
        ['id'=>22,'name'=>'Hagfinger','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'022.png'],
        ['id'=>23,'name'=>'Flower head','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'023.png'],
        ['id'=>24,'name'=>'Nightshade','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'024.png'],
        ['id'=>25,'name'=>'Ashblossom','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'025.png'],
        ['id'=>26,'name'=>'Ooze','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'026.png'],
        ['id'=>27,'name'=>'Antlers','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'027.png'],
        ['id'=>28,'name'=>'Belladonna','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'028.png'],
        ['id'=>29,'name'=>'Bone meal','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'029.png'],
        ['id'=>30,'name'=>'Myrrh','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'030.png'],
        ['id'=>31,'name'=>'Unicorn horn','group'=>'Brewery','sub'=>'Cure','value'=>2, 'image'=>'031.png'],
        ['id'=>32,'name'=>'Moonstalker','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'032.png'],
        ['id'=>33,'name'=>'Aqua vitae','group'=>'Brewery','sub'=>'Speed','value'=>2, 'image'=>'033.png'],
        ['id'=>34,'name'=>'Motherwort','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'034.png'],
        ['id'=>35,'name'=>'Human hair','group'=>'Poison','sub'=>'Sleep','value'=>3, 'image'=>'035.png'],
        ['id'=>36,'name'=>'Goosegrass','group'=>'Poison','sub'=>'Sleep','value'=>3, 'image'=>'036.png'],
        ['id'=>37,'name'=>'Balm','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'037.png'],
        ['id'=>38,'name'=>'Bezoar','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'038.png'],
        ['id'=>39,'name'=>'Phoenix ash','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'039.png'],
        ['id'=>40,'name'=>'Honey','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'040.png'],
        ['id'=>41,'name'=>'Wolfsbane','group'=>'Herbalism','sub'=>'Sleep','value'=>1, 'image'=>'041.png'],
        ['id'=>42,'name'=>'Philosopher\'s stone','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'042.png'],
        ['id'=>43,'name'=>'Neem oil','group'=>'Herbalism','sub'=>'Sleep','value'=>1, 'image'=>'043.png'],
        ['id'=>44,'name'=>'Kelp','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'044.png'],
        ['id'=>45,'name'=>'Lavender','group'=>'Herbalism','sub'=>'Sleep','value'=>1, 'image'=>'045.png'],
        ['id'=>46,'name'=>'Pegasus feather','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'046.png'],
        ['id'=>47,'name'=>'Mastic','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'047.png'],
        ['id'=>48,'name'=>'Lightmoss','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'048.png'],
        ['id'=>49,'name'=>'Sourgrass','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'049.png'],
        ['id'=>50,'name'=>'Pulvis Solaris','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'050.png'],
        ['id'=>51,'name'=>'Octopus powder','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'051.png'],
        ['id'=>52,'name'=>'Polypody','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'052.png'],
        ['id'=>53,'name'=>'Castor Oil','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'053.png'],
        ['id'=>54,'name'=>'Blowfly','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'054.png'],
        ['id'=>55,'name'=>'Fairy wings','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'055.png'],
        ['id'=>56,'name'=>'Silverthorn','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'056.png'],
        ['id'=>57,'name'=>'Liquor Hepatis','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'057.png'],
        ['id'=>58,'name'=>'Pomegranate juice','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'058.png'],
        ['id'=>59,'name'=>'Ice pop','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'059.png'],
        ['id'=>60,'name'=>'Oppopanax','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'060.png'],
        ['id'=>61,'name'=>'Death cap','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'061.png'],
        ['id'=>62,'name'=>'Dragon blood','group'=>'Poison','sub'=>'Harm','value'=>3, 'image'=>'062.png'],
        ['id'=>63,'name'=>'Cowbane','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'063.png'],
        ['id'=>64,'name'=>'Blood','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'064.png'],
        ['id'=>65,'name'=>'Fairy Stool','group'=>'Poison','sub'=>'Sleep','value'=>1, 'image'=>'065.png'],
        ['id'=>66,'name'=>'Wormwood','group'=>'Herbalism','sub'=>'Sleep','value'=>1, 'image'=>'066.png'],
        ['id'=>67,'name'=>'Bone','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'067.png'],
        ['id'=>68,'name'=>'Bat wing','group'=>'Poison','sub'=>'Sleep','value'=>1, 'image'=>'068.png'],
        ['id'=>69,'name'=>'Hemlock','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'069.png'],
        ['id'=>70,'name'=>'Ginger','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'070.png'],
        ['id'=>71,'name'=>'Galanthus Nivalis','group'=>'Herbalism','sub'=>'Cure','value'=>2, 'image'=>'071.png'],
        ['id'=>72,'name'=>'Frog legs','group'=>'Herbalism','sub'=>'Speed','value'=>1, 'image'=>'072.png'],
        ['id'=>73,'name'=>'Rose thorn','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'073.png'],
        ['id'=>74,'name'=>'Rue','group'=>'Herbalism','sub'=>'Cure','value'=>1, 'image'=>'074.png'],
        ['id'=>75,'name'=>'Azalea','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'075.png'],
        ['id'=>76,'name'=>'Aconite fluid','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'076.png'],
        ['id'=>77,'name'=>'Leech blood','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'077.png'],
        ['id'=>78,'name'=>'Doppelganger skin','group'=>'Poison','sub'=>'Steal','value'=>1, 'image'=>'078.png'],
        ['id'=>79,'name'=>'Hawk beak','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'079.png'],
        ['id'=>80,'name'=>'Bee sting','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'080.png'],
        ['id'=>81,'name'=>'Aqua fortis','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'081.png'],
        ['id'=>82,'name'=>'Ectoplasm','group'=>'Poison','sub'=>'Sleep','value'=>2, 'image'=>'082.png'],
        ['id'=>83,'name'=>'Magic fire','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'083.png'],
        ['id'=>84,'name'=>'Aqua regia','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'084.png'],
        ['id'=>85,'name'=>'Vermilion','group'=>'Poison','sub'=>'Sleep','value'=>2, 'image'=>'085.png'],
        ['id'=>86,'name'=>'Owl eye','group'=>'Poison','sub'=>'Hypnotise','value'=>2, 'image'=>'086.png'],
        ['id'=>87,'name'=>'Spider web','group'=>'Poison','sub'=>'Sleep','value'=>2, 'image'=>'087.png'],
        ['id'=>88,'name'=>'Mandrake','group'=>'Poison','sub'=>'Sleep','value'=>1, 'image'=>'088.png'],
        ['id'=>89,'name'=>'Gnat head','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'089.png'],
        ['id'=>90,'name'=>'Ghost essence','group'=>'Poison','sub'=>'Sleep','value'=>3, 'image'=>'090.png'],
        ['id'=>91,'name'=>'Daffodil','group'=>'Poison','sub'=>'Harm','value'=>2, 'image'=>'091.png'],
        ['id'=>92,'name'=>'Yew','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'092.png'],
        ['id'=>93,'name'=>'Baneberry','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'093.png'],
        ['id'=>94,'name'=>'Minotaur horn','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'094.png'],
        ['id'=>95,'name'=>'Orpiment','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'095.png'],
        ['id'=>96,'name'=>'Poison ivy','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'096.png'],
        ['id'=>97,'name'=>'Tentacle','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'097.png'],
        ['id'=>98,'name'=>'Vampire fang','group'=>'Poison','sub'=>'Steal','value'=>1, 'image'=>'098.png'],
        ['id'=>99,'name'=>'Wereteeth','group'=>'Poison','sub'=>'Harm','value'=>1, 'image'=>'099.png'],
        // SPECIAL CARDS
        ['id'=>100,'name'=>'Mirror','group'=>'Special','sub'=>'Mirror','value'=>0, 'image'=>'100.png'],
        ['id'=>101,'name'=>'Mirror','group'=>'Special','sub'=>'Mirror','value'=>0, 'image'=>'101.png'],
        ['id'=>102,'name'=>'Void','group'=>'Special','sub'=>'Void','value'=>0, 'image'=>'102.png'],
        ['id'=>103,'name'=>'Void','group'=>'Special','sub'=>'Void','value'=>0, 'image'=>'103.png'],
        ['id'=>104,'name'=>'Reflect','group'=>'Special','sub'=>'Reflect','value'=>0, 'image'=>'104.png'],
        ['id'=>105,'name'=>'Reflect','group'=>'Special','sub'=>'Reflect','value'=>0, 'image'=>'105.png'],
    ];
}

function addLog(&$state, $msg, $details = []) {
    if (!isset($state['log'])) $state['log'] = [];
    $state['log'][] = [
        'time' => date('H:i:s'),
        'msg' => $msg,
        'details' => $details
    ];
    if (count($state['log']) > 100) array_shift($state['log']);
}
// NEW GAME
if ($action === 'newgame') {
    $state = [
        "status" => "waiting",
        "players" => [],
        "deck" => [],
        "discard" => [],
        "turn" => null,
        "log" => [],
        "pending" => null
    ];
    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true]);
    exit;
}

// RESTART GAME
if ($action === 'restart') {
    if (count($state['players']) < 1) {
        echo json_encode(['error'=>'no players']);
        exit;
    }
    $state['status'] = 'playing';
    $state['deck'] = buildDeck();
    shuffle($state['deck']);
    $state['pending'] = null;
    foreach ($state['players'] as $pid => &$p) {
        if (!empty($p['spectator'])) {
            $p['hp'] = null;
            $p['dp'] = null;
            $p['alive'] = false;
            $p['sleep'] = false;
            $p['hand'] = [];
            $p['ready'] = false;
            continue;
        }
        $p['hp'] = 7;
        $p['dp'] = 0;
        $p['alive'] = true;
        $p['sleep'] = false;
        $p['hand'] = array_splice($state['deck'], 0, 7);
        $p['ready'] = true;
    }

    $state['turn'] = array_keys(array_filter($state['players'], fn($p) => empty($p['spectator'])))[0];

    addLog($state, "Game restarted!");

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true]);
    exit;
}

// JOIN GAME
if ($action === 'join') {

    $name = $_POST['name'] ?? 'Anon';
    $player_id = 'p_'.rand(10000,99999);

    if ($state['status'] === 'playing') {

        $state['players'][$player_id] = [
            'name' => $name,
            'hp' => null,
            'dp' => null,
            'hand' => [],
            'alive' => false,
            'sleep' => false,
            'ready' => false,
            'spectator' => true
        ];

        addLog(
            $state,
            "Spectator " . $name . " joined the match",
            [
                'spectator' => $player_id,
                'name' => $name
            ]
        );

        file_put_contents('state.json', json_encode($state));
        echo json_encode(['player_id'=>$player_id, 'spectator'=>true]);
        exit;
    }

    $state['players'][$player_id] = [
        'name' => $name,
        'hp' => 7,
        'dp' => 0,
        'hand' => [],
        'alive' => true,
        'sleep' => false,
        'ready' => false,
        'spectator' => false
    ];

    addLog($state, $name . " joined the game");

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['player_id'=>$player_id, 'spectator'=>false]);
    exit;
}

// PLAYER VALIDATION
$player_id = $_POST['player'] ?? null;
if (!$player_id || !isset($state['players'][$player_id])) {
    echo json_encode(['error'=>'no player']);
    exit;
}

// DRAW CARDS
function drawCards(&$state, $player_id, $count) {
    for ($i=0; $i<$count && count($state['deck'])>0; $i++) {
        $state['players'][$player_id]['hand'][] = array_shift($state['deck']);
    }
}

// EFFECTS
function harmEffect(&$state, $target_id, $value) {
    $t =& $state['players'][$target_id];
    $damage = $value;

    if ($t['dp'] > 0) {
        $absorbed = min($t['dp'], $damage);
        $t['dp'] -= $absorbed;
        $damage -= $absorbed;
    }

    if ($damage > 0) {
        $t['hp'] -= $damage;
        if ($t['hp'] <= 0) {
            $t['hp'] = 0;
            $t['alive'] = false;
        }
    }

    addLog(
        $state,
        $state['players'][$target_id]['name'] . " took " . $value . " Harm",
        [
            'target' => $target_id,
            'damage' => $value
        ]
    );
}

function stealEffect(&$state, $from_id, $target_id) {
    $target =& $state['players'][$target_id];
    $from   =& $state['players'][$from_id];

    if (count($target['hand']) == 0) return;

    $idx = array_rand($target['hand']);
    $card = $target['hand'][$idx];

    unset($target['hand'][$idx]);
    $target['hand'] = array_values($target['hand']);

    $from['hand'][] = $card;

    addLog(
        $state,
        $state['players'][$from_id]['name'] . " stole a card from " . $state['players'][$target_id]['name'],
        [
            'from' => $from_id,
            'target' => $target_id,
            'card' => $card
        ]
    );
}

function hypnotiseEffect(&$state, $target_id) {
    $target =& $state['players'][$target_id];

    if (count($target['hand']) == 0) return;

    $idx = array_rand($target['hand']);
    $card = $target['hand'][$idx];

    unset($target['hand'][$idx]);
    $target['hand'] = array_values($target['hand']);

    $state['deck'][] = $card;

    addLog(
        $state,
        $state['players'][$target_id]['name'] . " was HYPNOTISED",
        [
            'target' => $target_id,
            'returned_card' => $card
        ]
    );
}

// NEXT TURN
function nextTurn(&$state) {
    $ids = array_keys($state['players']);
    $idx = array_search($state['turn'], $ids);

    while (true) {
        $idx = ($idx + 1) % count($ids);
        $next = $ids[$idx];

        if (!empty($state['players'][$next]['spectator'])) continue;
        if (!$state['players'][$next]['alive']) continue;
        if ($state['players'][$next]['sleep']) continue;

        break;
    }

    foreach ($state['players'] as &$p) {
        if ($p['sleep']) $p['sleep'] = false;
    }

    $state['turn'] = $next;
}

// CHECK END
function checkEnd(&$state) {
    if ($state['status'] !== 'playing') return;

    $alive = array_filter(
        $state['players'],
        fn($p) => $p['alive'] && empty($p['spectator'])
    );

    if (count($alive) === 1) {
        $winner = array_keys($alive)[0];
        $state['status'] = 'ended';
        $state['winner'] = $winner;

        addLog(
            $state,
            "Winner: " . $state['players'][$winner]['name'],
            [
                'winner' => $winner
            ]
        );
    }
}

// APPLY EFFECT (used by defense)
function applyEffect(&$state, $attacker_id, $target_id, $sub, $value) {

    switch ($sub) {

        case 'Defend':
            $state['players'][$target_id]['dp'] =
                min(7, $state['players'][$target_id]['dp'] + $value);
            addLog($state, $state['players'][$attacker_id]['name']." applied DEFEND to ".$state['players'][$target_id]['name']);
            break;

        case 'Influence':
            drawCards($state, $target_id, $value);
            addLog($state, $state['players'][$attacker_id]['name']." applied INFLUENCE to ".$state['players'][$target_id]['name']);
            break;

        case 'Cure':
            $state['players'][$target_id]['hp'] =
                min(7, $state['players'][$target_id]['hp'] + $value);
            addLog($state, $state['players'][$attacker_id]['name']." applied CURE to ".$state['players'][$target_id]['name']);
            break;

        case 'Speed':
            addLog($state, $state['players'][$attacker_id]['name']." applied SPEED to ".$state['players'][$target_id]['name']);
            $state['turn'] = $target_id;
            break;

        case 'Sleep':
            $state['players'][$target_id]['sleep'] = true;
            addLog($state, $state['players'][$target_id]['name']." was put to SLEEP");
            break;

        case 'Hypnotise':
            hypnotiseEffect($state, $target_id);
            break;

        case 'Harm':
            harmEffect($state, $target_id, $value);
            break;

        case 'Steal':
            stealEffect($state, $attacker_id, $target_id);
            break;
    }
}
/* ============================
   PLAYER READY
============================ */
if ($action === 'ready') {

    if (!isset($state['players'][$player_id])) {
        echo json_encode(['error'=>'player not found']);
        exit;
    }

    $state['players'][$player_id]['ready'] = true;
    addLog($state, $state['players'][$player_id]['name']." is ready");

    $allReady = true;
    foreach ($state['players'] as $p) {
        if (!empty($p['spectator'])) continue;
        if (empty($p['ready'])) {
            $allReady = false;
            break;
        }
    }

    if ($allReady && $state['status']==='waiting') {

        $state['status'] = 'playing';
        $state['deck'] = buildDeck();
        shuffle($state['deck']);

        foreach ($state['players'] as $pid => &$p) {
            if (!empty($p['spectator'])) {
                $p['hand'] = [];
                continue;
            }
            $p['hand'] = array_splice($state['deck'], 0, 7);
        }

        $state['turn'] = array_keys(
            array_filter($state['players'], fn($p)=>empty($p['spectator']))
        )[0];
    }

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true]);
    exit;
}

/* ============================
   PASS
============================ */
if ($action === 'pass') {

    if (!empty($state['players'][$player_id]['spectator'])) {
        echo json_encode(['error'=>'spectators cannot play']);
        exit;
    }

    if ($state['turn'] !== $player_id) {
        echo json_encode(['error'=>'not your turn']);
        exit;
    }

    if (!empty($state['pending'])) {
        echo json_encode(['error'=>'cannot pass while defense pending']);
        exit;
    }

    drawCards($state, $player_id, 1);

    addLog($state, $state['players'][$player_id]['name']." played PASS");

    nextTurn($state);
    checkEnd($state);

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true]);
    exit;
}

/* ============================
   CRAFT (ATTACKER)
============================ */
if ($action === 'craft') {

    if (!empty($state['players'][$player_id]['spectator'])) {
        echo json_encode(['error'=>'spectators cannot play']);
        exit;
    }

    if ($state['turn'] !== $player_id) {
        echo json_encode(['error'=>'not your turn']);
        exit;
    }

    if (!empty($state['pending'])) {
        echo json_encode(['error'=>'defense pending, cannot craft']);
        exit;
    }

    $cards = $_POST['cards'] ?? [];
    $target_id = $_POST['target'] ?? $player_id;

    if (!isset($state['players'][$target_id])) {
        echo json_encode(['error'=>'invalid target']);
        exit;
    }

    if (!$state['players'][$target_id]['alive'] && $target_id !== $player_id) {
        echo json_encode(['error'=>'target is dead']);
        exit;
    }

    if (count($cards) !== 2) {
        echo json_encode(['error'=>'craft requires exactly 2 cards']);
        exit;
    }

    $handIds = array_map(fn($c)=>$c['id'], $state['players'][$player_id]['hand']);
    foreach ($cards as $cid) {
        if (!in_array($cid, $handIds)) {
            echo json_encode(['error'=>'invalid card: not in hand']);
            exit;
        }
    }

    // Remove cards from hand
    $cardObjs = [];
    foreach ($cards as $cid) {
        foreach ($state['players'][$player_id]['hand'] as $idx=>$c) {
            if ($c['id']==$cid) {
                $cardObjs[] = $c;
                unset($state['players'][$player_id]['hand'][$idx]);
                break;
            }
        }
    }
    $state['players'][$player_id]['hand'] = array_values($state['players'][$player_id]['hand']);

    if ($cardObjs[0]['sub'] !== $cardObjs[1]['sub']) {
        echo json_encode(['error'=>'craft requires same sub-type']);
        exit;
    }

    $sub = $cardObjs[0]['sub'];
    $value = $cardObjs[0]['value'];

    // SPECIALS cannot be used as attack
    if (in_array($sub, ['Mirror','Void','Reflect'])) {
        echo json_encode(['error'=>'special cards are defensive only']);
        exit;
    }

    // Create pending effect
    $state['pending'] = [
        'attacker' => $player_id,
        'target'   => $target_id,
        'sub'      => $sub,
        'value'    => $value,
        'cards'    => $cardObjs
    ];

    addLog(
        $state,
        $state['players'][$player_id]['name']." initiated CRAFT ($sub) on ".$state['players'][$target_id]['name'],
        ['effect'=>$sub,'value'=>$value,'cards'=>$cardObjs]
    );

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true,'pending'=>true]);
    exit;
}

/* ============================
   DEFEND (DEFENDER)
============================ */
if ($action === 'defend') {

    if (empty($state['pending'])) {
        echo json_encode(['error'=>'no pending effect']);
        exit;
    }

    $pending = $state['pending'];
    $attacker = $pending['attacker'];
    $originalTarget = $pending['target'];
    $sub = $pending['sub'];
    $value = $pending['value'];

    $choice = $_POST['choice'] ?? null;
    $reflectTarget = $_POST['reflect_target'] ?? null;

    if ($player_id !== $originalTarget) {
        echo json_encode(['error'=>'only target can defend']);
        exit;
    }

    if (!in_array($choice, ['continue','mirror','void','reflect'])) {
        echo json_encode(['error'=>'invalid defense choice']);
        exit;
    }

    /* ============================
       SPECIAL CARD CHECK (1 card)
    ============================ */
    if ($choice !== 'continue') {

        $requiredSub = null;
        if ($choice==='mirror')  $requiredSub='Mirror';
        if ($choice==='void')    $requiredSub='Void';
        if ($choice==='reflect') $requiredSub='Reflect';

        $hand = $state['players'][$player_id]['hand'];
        $specialCards = array_filter($hand, fn($c)=>$c['sub']===$requiredSub);

        if (count($specialCards) < 1) {
            echo json_encode(['error'=>'You do not have a '.$requiredSub.' card']);
            exit;
        }

        // Remove ONE special card
        foreach ($state['players'][$player_id]['hand'] as $idx=>$c) {
            if ($c['sub']===$requiredSub) {
                unset($state['players'][$player_id]['hand'][$idx]);
                break;
            }
        }
        $state['players'][$player_id]['hand'] = array_values($state['players'][$player_id]['hand']);
    }

    /* ============================
       REFLECT TARGET CHECK
    ============================ */
    if ($choice==='reflect') {

        if (!$reflectTarget || !isset($state['players'][$reflectTarget])) {
            echo json_encode(['error'=>'invalid reflect target']);
            exit;
        }

        if (!empty($state['players'][$reflectTarget]['spectator'])) {
            echo json_encode(['error'=>'cannot reflect to spectator']);
            exit;
        }

        if (!$state['players'][$reflectTarget]['alive']) {
            echo json_encode(['error'=>'reflect target is dead']);
            exit;
        }
    }

    /* ============================
       APPLY DEFENSE LOGIC
    ============================ */

    if ($choice==='continue') {

        applyEffect($state, $attacker, $originalTarget, $sub, $value);
        addLog($state, $state['players'][$originalTarget]['name']." accepted the effect ($sub)");

    } elseif ($choice==='mirror') {

        applyEffect($state, $attacker, $attacker, $sub, $value);
        addLog($state, $state['players'][$originalTarget]['name']." used MIRROR against ".$state['players'][$attacker]['name']);

    } elseif ($choice==='void') {

        addLog($state, $state['players'][$originalTarget]['name']." used VOID and cancelled ($sub)");

    } elseif ($choice==='reflect') {

        applyEffect($state, $attacker, $reflectTarget, $sub, $value);
        addLog($state, $state['players'][$originalTarget]['name']." used REFLECT and redirected ($sub) to ".$state['players'][$reflectTarget]['name']);
    }

    /* ============================
       CLEAR PENDING + NEXT TURN
    ============================ */
    $state['pending'] = null;

    nextTurn($state);
    checkEnd($state);

    file_put_contents('state.json', json_encode($state));
    echo json_encode(['ok'=>true]);
    exit;
}

/* ============================
   DEFAULT SAVE
============================ */
file_put_contents('state.json', json_encode($state));
echo json_encode(['ok'=>true]);
