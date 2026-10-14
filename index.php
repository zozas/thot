<!DOCTYPE html>
<html>
<head>
<title>THOT Multiplayer</title>
<style>
body { font-family: Arial; }
#cards div { border:1px solid #ccc; padding:5px; margin:3px; display:inline-block; }
#defensePanel, #reflectPanel { border:1px solid #ccc; padding:10px; margin-top:10px; background:#f9f9f9; }
</style>
</head>
<body>

<h1>THOT Multiplayer</h1>

<button onclick="newGame()">New Game</button>
<button onclick="restartGame()">Restart Game</button>

<div>
  Όνομα παίκτη: <input id="name" />
  <button onclick="join()">Join</button>
  <button onclick="playerReady()">Start</button>
</div>

<hr>

<div id="status"></div>
<div id="players"></div>

<h2>Game Log</h2>
<div id="log" style="white-space:pre-line; border:1px solid #ccc; padding:10px; height:200px; overflow-y:auto;"></div>

<!-- INLINE DEFENSE PANEL (VISIBLE TO ALL, ONLY DEFENDER CAN CLICK) -->
<div id="defensePanel" style="display:none;">
    <h3>Defense Window</h3>
    <div id="defenseInfo"></div>
    <button id="btnContinue" onclick="sendDefense('continue')">Accept Effect</button>
    <button id="btnMirror" onclick="sendDefense('mirror')">Mirror</button>
    <button id="btnVoid" onclick="sendDefense('void')">Void</button>
    <button id="btnReflect" onclick="showReflectPanel()">Reflect</button>
</div>

<div id="reflectPanel" style="display:none;">
    <h4>Choose player to reflect to</h4>
    <select id="reflectSelect"></select>
    <button id="btnReflectConfirm" onclick="sendReflectDefense()">Confirm Reflect</button>
</div>

<!-- SPECTATOR FOLLOW MODE -->
<div id="spectatorPanel" style="display:none;">
    <h3>Spectator Follow Mode</h3>
    <select id="followSelect"></select>
    <button onclick="followPlayer()">Follow</button>
    <div id="followView" style="border:1px solid #ccc; padding:10px; margin-top:10px;"></div>
</div>

<h2 id="handTitle">Your Hand</h2>
<div id="cards"></div>

<h3 id="actionsTitle">Actions</h3>
<div id="actionsPanel">
    <button onclick="playPass()">Pass</button>
    <button onclick="startCraft()">Craft</button>
</div>

<div id="craftPanel" style="display:none;">
  <p>Επίλεξε 2 κάρτες (IDs χωρισμένα με κόμμα) και στόχο (player ID):</p>
  Cards: <input id="craftCards"><br>
  Target ID: <input id="craftTarget"><br>
  <button onclick="sendCraft()">Play Craft</button>
</div>

<script>
let playerId = null;
let refreshTimer = null;
let followedPlayer = null;

function join() {
  const name = document.getElementById('name').value || 'Anon';

  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=join&name='+encodeURIComponent(name)
  })
  .then(r => r.json())
  .then(d => {
    playerId = d.player_id;
    refresh();
    refreshTimer = setInterval(refresh, 5000);
  });
}

function playerReady() {
  if (!playerId) return;

  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=ready&player='+encodeURIComponent(playerId)
  })
  .then(() => refresh());
}

function refresh() {
  if (!playerId) return;

  fetch('get_state.php?player='+playerId)
    .then(r => r.json())
    .then(renderState);
}

function renderState(data) {
  if (!data || !data.players || !data.players[playerId]) return;

  const me = data.players[playerId];

  // STATUS
  let statusText = 'Status: '+data.status+' | Turn: '+data.turn;

  if (data.status === 'ended' && data.winner && data.players[data.winner]) {
    let w = data.winner;
    statusText = 'GAME OVER — Winner: ' + data.players[w].name + ' (' + w + ')';
  }

  if (me.spectator) {
    statusText += ' — You are a SPECTATOR';

    const activePlayers = Object.values(data.players)
      .filter(p => !p.spectator).length;

    statusText += ' — Spectating ' + activePlayers + ' players';
  }

  document.getElementById('status').innerHTML = statusText;

  // DISABLE GAME BUTTONS FOR SPECTATORS (EXCEPT Follow, New, Restart, Join)
  document.querySelectorAll('button').forEach(btn => {
    const txt = btn.innerText;
    if (me.spectator &&
        txt !== "New Game" &&
        txt !== "Restart Game" &&
        txt !== "Join" &&
        txt !== "Follow") {
      btn.disabled = true;
    } else {
      btn.disabled = false;
    }
  });

  // PLAYERS LIST
  let htmlPlayers = '';
  for (let pid in data.players) {
    const p = data.players[pid];
    if (p.spectator) {
      htmlPlayers += pid+' ('+p.name+'): [SPECTATOR]<br>';
    } else {
      htmlPlayers += pid+' ('+p.name+'): HP '+p.hp+' / DP '+p.dp+
                     (p.alive ? '' : ' [DEAD]')+
                     (p.sleep ? ' [SLEEP]' : '')+'<br>';
    }
  }
  document.getElementById('players').innerHTML = htmlPlayers;

  // LOG
  let logHtml = "";
  for (let entry of data.log || []) {
    logHtml += `[${entry.time}] ${entry.msg}\n`;
    if (entry.details) logHtml += JSON.stringify(entry.details, null, 2) + "\n";
    logHtml += "\n";
  }
  document.getElementById('log').innerHTML = logHtml;

  // HAND — spectators do NOT see this section
  const handSection = document.getElementById('cards');
  const handTitle = document.getElementById('handTitle');

  if (me.spectator) {
    handSection.style.display = 'none';
    handTitle.style.display = 'none';
  } else {
    handSection.style.display = 'block';
    handTitle.style.display = 'block';
    handSection.innerHTML =
      me.hand.map(c => '<div>'+c.id+': '+c.name+' ('+c.sub+')</div>').join('');
  }

  // ACTIONS — hide for spectators
  const actionsPanel = document.getElementById('actionsPanel');
  const actionsTitle = document.getElementById('actionsTitle');

  if (me.spectator) {
    actionsPanel.style.display = 'none';
    actionsTitle.style.display = 'none';
  } else {
    actionsPanel.style.display = 'block';
    actionsTitle.style.display = 'block';
  }

  // SPECTATOR FOLLOW MODE
  const spectatorPanel = document.getElementById('spectatorPanel');

  if (me.spectator) {
    spectatorPanel.style.display = 'block';

    let sel = document.getElementById('followSelect');
    sel.innerHTML = "";

    for (let pid in data.players) {
      if (!data.players[pid].spectator) {
        let opt = document.createElement('option');
        opt.value = pid;
        opt.textContent = data.players[pid].name + " (" + pid + ")";
        sel.appendChild(opt);
      }
    }

    if (!followedPlayer) {
      followedPlayer = data.turn;
    }

    if (followedPlayer && data.players[followedPlayer]) {
      let fp = data.players[followedPlayer];
      let fv = "Following: " + fp.name + " (" + followedPlayer + ")\n";
      fv += "HP: " + fp.hp + " / DP: " + fp.dp + "\n\n";
      fv += "Cards:\n";
      for (let c of fp.hand) {
        fv += "- " + c.id + ": " + c.name + " (" + c.sub + ", value " + c.value + ")\n";
      }
      document.getElementById('followView').innerText = fv;
    } else {
      document.getElementById('followView').innerText = "";
    }

  } else {
    spectatorPanel.style.display = 'none';
    followedPlayer = null;
    document.getElementById('followView').innerText = "";
  }

  // DEFENSE PANEL (VISIBLE TO ALL, ONLY TARGET CAN CLICK)
  const defensePanel = document.getElementById('defensePanel');
  const defenseInfo = document.getElementById('defenseInfo');
  const reflectPanel = document.getElementById('reflectPanel');

  if (data.pending) {
    defensePanel.style.display = 'block';
    reflectPanel.style.display = 'none';

    const attacker = data.pending.attacker;
    const target = data.pending.target;
    const sub = data.pending.sub;
    const value = data.pending.value;

    let info = "Attacker: " + data.players[attacker].name + " (" + attacker + ")<br>";
    info += "Target: " + data.players[target].name + " (" + target + ")<br>";
    info += "Effect: " + sub + " (value " + value + ")<br>";
    info += "Cards:<br>";
    for (let c of data.pending.cards) {
      info += "- " + c.id + ": " + c.name + " (" + c.sub + ", value " + c.value + ")<br>";
    }
    defenseInfo.innerHTML = info;

    const isDefender = (playerId === target);

    document.getElementById('btnContinue').disabled = !isDefender;
    document.getElementById('btnMirror').disabled = !isDefender;
    document.getElementById('btnVoid').disabled = !isDefender;
    document.getElementById('btnReflect').disabled = !isDefender;

  } else {
    defensePanel.style.display = 'none';
    reflectPanel.style.display = 'none';
  }
}

function playPass() {
  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=pass&player='+encodeURIComponent(playerId)
  }).then(() => refresh());
}

function startCraft() {
  document.getElementById('craftPanel').style.display = 'block';
}

function sendCraft() {
  const cardsStr = document.getElementById('craftCards').value;
  const target = document.getElementById('craftTarget').value || playerId;
  const cards = cardsStr.split(',').map(s => parseInt(s.trim())).filter(x => !isNaN(x));

  const body =
    'action=craft' +
    '&player=' + encodeURIComponent(playerId) +
    '&target=' + encodeURIComponent(target) +
    cards.map(c => '&cards[]=' + encodeURIComponent(c)).join('');

  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body: body
  })
  .then(r => r.json())
  .then(d => {
    if (d.error) {
      alert('Craft error: ' + d.error);
    }
    refresh();
  });
}

function newGame() {
  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=newgame'
  })
  .then(() => {
    playerId = null;
    followedPlayer = null;
    alert("New game created. Press Join.");
  });
}

function restartGame() {
  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=restart'
  })
  .then(() => refresh());
}

function followPlayer() {
  followedPlayer = document.getElementById('followSelect').value;
  if (followedPlayer === playerId) {
    alert("Spectators cannot follow themselves.");
    followedPlayer = null;
    return;
  }
  refresh();
}

// DEFENSE ACTIONS
function sendDefense(choice) {
  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=defend&player='+encodeURIComponent(playerId)+'&choice='+encodeURIComponent(choice)
  })
  .then(r => r.json())
  .then(d => {
    if (d.error) {
      alert('Defense error: ' + d.error);
    }
    refresh();
  });
}

function showReflectPanel() {
  const reflectPanel = document.getElementById('reflectPanel');
  const reflectSelect = document.getElementById('reflectSelect');
  reflectPanel.style.display = 'block';
  reflectSelect.innerHTML = "";

  // Fill with all non-spectator, alive players
  fetch('get_state.php?player='+playerId)
    .then(r => r.json())
    .then(data => {
      for (let pid in data.players) {
        const p = data.players[pid];
        if (!p.spectator && p.alive) {
          let opt = document.createElement('option');
          opt.value = pid;
          opt.textContent = p.name + " (" + pid + ")";
          reflectSelect.appendChild(opt);
        }
      }
    });
}

function sendReflectDefense() {
  const reflectTarget = document.getElementById('reflectSelect').value;

  fetch('play_action.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'action=defend&player='+encodeURIComponent(playerId)+'&choice=reflect&reflect_target='+encodeURIComponent(reflectTarget)
  })
  .then(r => r.json())
  .then(d => {
    if (d.error) {
      alert('Defense error: ' + d.error);
    }
    refresh();
  });
}
</script>

</body>
</html>
