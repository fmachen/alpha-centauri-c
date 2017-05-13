'use strict';
var shipState = {
    player: null,
    preload: function () {
        game.stage.disableVisibilityChange = true;
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 32, 40);
    },
    create: function () {

        this.player = Player.create();
        Client.sendNewPlayer(
            {
                x: this.player.body.x,
                y: this.player.body.y
            }
        );
        Client.getPlayers();
        // Create cursors
        this.cursors = game.input.keyboard.createCursorKeys();
        /*game.inputEnabled = true;
         game.input.onDown.add(function (layer, pointer) {
         client.sendClick(pointer.clientX, pointer.clientY);
         }, this);*/
        //client.askNewPlayer();
    },
    update: function () {
        this.player.moving = false;
        if (this.cursors.up.isDown) {
            this.player.moving = true;
            this.player.body.y -= 5;
            this.player.animations.play('up');
        }

        if (this.cursors.down.isDown) {
            this.player.moving = true;
            this.player.body.y += 5;
            this.player.animations.play('down');
        }

        if (this.cursors.left.isDown) {
            this.player.moving = true;
            this.player.body.x -= 5;
            this.player.animations.play('left');
        }

        if (this.cursors.right.isDown) {
            this.player.moving = true;
            this.player.body.x += 5;
            this.player.animations.play('right');
        }
        if (!this.player.moving) {
            this.player.animations.stop();
        } else {
            Client.sendMove(this.player.body.x, this.player.body.y);
        }
    }
};