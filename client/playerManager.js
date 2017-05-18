var PlayerManager = {};

PlayerManager.add = function(id, x, y){
    console.log("addNewPlayer");
    game.playerMap[id] = new Player();
    game.playerMap[id].setPosition(x, y);
    console.log(game.playerMap[id]);
}

PlayerManager.remove = function(id){
    console.log("removePlayer");
    game.playerMap[id].destroy();
    delete game.playerMap[id];
}

PlayerManager.move = function (id, x, y) {
    var player = game.playerMap[id];
    player.x = x;
    player.y = y;
};