'use strict';

var game = new Phaser.Game(16 * 32, 600, Phaser.AUTO, document.getElementById('game'));
game.state.add('Game', Game);
game.state.start('Game');
var Game = {};

Game.init = function () {
    game.stage.disableVisibilityChange = true;
};

Game.preload = function () {
    game.load.spritesheet('characters', 'assets/sprites/characters.png', 24, 24);
};
