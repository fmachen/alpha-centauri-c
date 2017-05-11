'use strict';
var playState = {
    preload: function(){
        game.stage.disableVisibilityChange = true;
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 33, 40);
    },
    create: function(){
        this.player = game.add.sprite(game.width/2,game.height/2,'characters');
        game.physics.arcade.enable(this.player);
        this.cursors = game.input.keyboard.createCursorKeys();
    },
    update: function(){
        if( this.cursors.up.isDown ){
            this.player.body.y -= 5;
        }

        if( this.cursors.down.isDown ){
            this.player.body.y += 5;
        }

        if( this.cursors.left.isDown ){
            this.player.body.x -= 5;
        }

        if( this.cursors.right.isDown ){
            this.player.body.x += 5;
        }
    }

}