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
        this.player = new Player();
        Client.sendNewPlayer(
            {
                x: this.player.entity.body.x,
                y: this.player.entity.body.y
            }
        );
        Client.getPlayers();

        // Camera
        game.camera.follow(this.player.entity);

        // Create cursors
        this.cursors = game.input.keyboard.createCursorKeys();

        console.log(this.ship.spawns);
        this.player.spawn(this.ship.spawns);
    },
    update: function () {
        var self = this;
        this.player.entity.moving = false;
        this.player.entity.body.velocity.x = 0;
        this.player.entity.body.velocity.y = 0;
        this.ship.getLayersCollision().forEach(function(layer){
            game.physics.arcade.collide(self.player.entity,layer,function(player, layer){
                //console.log(player);
            });
        });
        if (this.cursors.up.isDown) {
            this.player.entity.moving = true;
            this.player.entity.body.velocity.y = -250;
            this.player.entity.animations.play('up');
        }else if (this.cursors.down.isDown) {
            this.player.entity.moving = true;
            this.player.entity.body.velocity.y = 250;
            this.player.entity.animations.play('down');
        }else if (this.cursors.left.isDown) {
            this.player.entity.moving = true;
            this.player.entity.body.velocity.x = -250;
            this.player.entity.animations.play('left');
        }else if (this.cursors.right.isDown) {
            this.player.entity.moving = true;
            this.player.entity.body.velocity.x = 250;
            this.player.entity.animations.play('right');
        }
        if (!this.player.entity.moving) {
            this.player.entity.animations.stop();
        } else {
            Client.sendMove(this.player.entity.body.x, this.player.entity.body.y);
        }
    }
};