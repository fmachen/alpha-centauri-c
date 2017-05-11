'use strict';

var game = new Phaser.Game(33 * 32, 600, Phaser.AUTO, document.getElementById('game'));
game.state.add('Play', playState);
game.state.start('Play');

game.playerMap = {};

game.getCoordinates = function (layer, pointer) {
    console.log("getCoordinates");
    console.log("pointer", pointer);
    Client.sendClick(pointer.clientX, pointer.clientY);
};

game.addNewPlayer = function (id, x, y) {
    console.log("addNewPlayer");
    game.playerMap[id] = game.add.sprite(x, y, 'characters');
};

game.movePlayer = function (id, x, y) {
    console.log("movePlayer");
    var player = game.playerMap[id];
    var distance = Phaser.Math.distance(player.x, player.y, x, y);
    var tween = game.add.tween(player);
    var duration = distance * 10;
    tween.to({x: x, y: y}, duration);
    tween.start();
};

game.removePlayer = function (id) {
    console.log("removePlayer");
    game.playerMap[id].destroy();
    delete game.playerMap[id];
};