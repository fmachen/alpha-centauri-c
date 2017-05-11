'use strict';
var playState = {
    preload: function(){
        game.stage.disableVisibilityChange = true;
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 33, 40);
    },
    create: function(){
        game.add.sprite(game.width/2,game.height/2,'characters');
    }
}