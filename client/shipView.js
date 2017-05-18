'use strict';
var shipViewState = {
    player: null,
    preload: function () {
        game.stage.disableVisibilityChange = true;
        game.stage.backgroundColor = '#04151F';
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 32, 40);

        this.ship = new Ship('test2');
        console.log(this.ship);
    },
    create: function () {
        this.ship.create();
        this.player = Player.create();
        Client.sendNewPlayer(
            {
                x: this.player.body.x,
                y: this.player.body.y
            }
        );
        Client.getPlayers();

        // Camera
        game.camera.follow(this.player);

        // Create cursors
        this.cursors = game.input.keyboard.createCursorKeys();

        // Set player collision

        console.log(this.ship.layers[1]);

    },
    update: function () {
        var self = this;
        this.player.moving = false;
        this.player.body.velocity.x = 0;
        this.player.body.velocity.y = 0;
        this.ship.getLayersCollision().forEach(function(layer){
            game.physics.arcade.collide(self.player,layer,function(player, layer){
                //console.log(player);
            });
        });
        if (this.cursors.up.isDown) {
            this.player.moving = true;
            this.player.body.velocity.y = -250;
            this.player.animations.play('up');
        }else if (this.cursors.down.isDown) {
            this.player.moving = true;
            this.player.body.velocity.y = 250;
            this.player.animations.play('down');
        }else if (this.cursors.left.isDown) {
            this.player.moving = true;
            this.player.body.velocity.x = -250;
            this.player.animations.play('left');
        }else if (this.cursors.right.isDown) {
            this.player.moving = true;
            this.player.body.velocity.x = 250;
            this.player.animations.play('right');
        }
        if (!this.player.moving) {
            this.player.animations.stop();
        } else {
            Client.sendMove(this.player.body.x, this.player.body.y);
        }
    }
};