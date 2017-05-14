'use strict';
var shipViewState = {
    player: null,
    preload: function () {
        game.stage.disableVisibilityChange = true;
        game.stage.backgroundColor = '#04151F';
        game.load.spritesheet('characters', 'assets/sprites/characters.png', 32, 40);
        this.ship = new Ship('test2');
        //console.log(this.ship);
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

        // Camera
        game.camera.follow(this.player);

        // Create cursors
        this.cursors = game.input.keyboard.createCursorKeys();

        this.map = game.add.tiles
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