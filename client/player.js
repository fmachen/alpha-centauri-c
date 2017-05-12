var Player = function(){
    this.me = null
};

Player.add = function(id, x, y){
    console.log("addNewPlayer");
    game.playerMap[id] = game.add.sprite(x, y, 'characters');
    game.physics.arcade.enable(game.playerMap[id]);
    game.playerMap[id].body.collideWorldBounds = true;
    game.playerMap[id].animations.add('up', [36, 37, 38], 10, true);
    game.playerMap[id].animations.add('down', [0, 1, 2], 10, true);
    game.playerMap[id].animations.add('left', [12, 13, 14], 10, true);
    game.playerMap[id].animations.add('right', [24, 25, 26], 10, true);
}

Player.remove = function (id) {
    console.log("removePlayer");
    game.playerMap[id].destroy();
    delete game.playerMap[id];
};

Player.move = function (id, x, y) {
    console.log("movePlayer");
    var player = game.playerMap[id];
    var distance = Phaser.Math.distance(player.x, player.y, x, y);
    var tween = game.add.tween(player);
    var duration = distance * 10;
    tween.to({x: x, y: y}, duration);
    tween.start();
};