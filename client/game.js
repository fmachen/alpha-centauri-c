'use strict';

var game = new Phaser.Game(33 * 32, 600, Phaser.AUTO, document.getElementById('game'));
game.state.add('ShipView', shipViewState);

game.playerMap = {};
game.me = null;

// Launch state
game.state.start('ShipView');

