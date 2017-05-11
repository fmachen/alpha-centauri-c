'use strict';
var playState = {
    preload: function(){
        game.stage.disableVisibilityChange = true;
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 32, 40);
    },
    create: function(){
/*
 game.physics.arcade.enable(this.player);
        // Add player and set properties
        this.player = game.add.sprite(game.width/2,game.height/2,'characters');
        this.player.body.collideWorldBounds = true;
        this.player.animations.add('up', [36, 37, 38], 10, true);
        this.player.animations.add('down', [0, 1, 2], 10, true);
        this.player.animations.add('left', [12, 13, 14], 10, true);
        this.player.animations.add('right', [24, 25, 26], 10, true);

        // Create cursors
        this.cursors = game.input.keyboard.createCursorKeys();
//*/
        Client.askNewPlayer();
    },
    /*
    update: function(){
        this.player.moving = false;
        if( this.cursors.up.isDown ){
            this.player.moving = true;
            this.player.body.y -= 5;
            this.player.animations.play('up');
        }

        if( this.cursors.down.isDown ){
            this.player.moving = true;
            this.player.body.y += 5;
            this.player.animations.play('down');
        }

        if( this.cursors.left.isDown ){
            this.player.moving = true;
            this.player.body.x -= 5;
            this.player.animations.play('left');
        }

        if( this.cursors.right.isDown ){
            this.player.moving = true;
            this.player.body.x += 5;
            this.player.animations.play('right');
        }
        if( !this.player.moving ){
            this.player.animations.stop();
        }
    }
    //*/

}