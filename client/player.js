var Player = function(){
};

Player.create = function(x, y){
    var entity = game.add.sprite(x, y, 'characters');
    game.physics.arcade.enable(entity);
    entity.body.collideWorldBounds = true;
    entity.animations.add('up', [36, 37, 38], 10, true);
    entity.animations.add('down', [0, 1, 2], 10, true);
    entity.animations.add('left', [12, 13, 14], 10, true);
    entity.animations.add('right', [24, 25, 26], 10, true);
    return entity;
};
Player.add = function(id, x, y){
    console.log("addNewPlayer");
    game.playerMap[id] = Player.create(x, y);
    console.log(game.playerMap[id]);
}

Player.remove = function (id) {
    console.log("removePlayer");
    game.playerMap[id].destroy();
    delete game.playerMap[id];
};

Player.move = function (id, x, y) {
    //console.log("movePlayer");
    var player = game.playerMap[id];
    player.x = x;
    player.y = y;
    /*var distance = Phaser.Math.distance(player.x, player.y, x, y);
    var tween = game.add.tween(player);
    var duration = distance * 10;
    tween.to({x: x, y: y}, duration);
    tween.start();*/
};