'use strict';

var game = new Phaser.Game(33 * 32, 600, Phaser.AUTO, document.getElementById('game'));

game.playerMap = {};
game.me = null;

game.state.add('boot', bootState);
game.state.add('load', loadState);
game.state.add('title', titleState);
game.state.add('ShipView', shipViewState);

game.state.start('boot');

