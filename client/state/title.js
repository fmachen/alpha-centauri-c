var titleState = {
    create: function () {
        var nameLabel = game.add.text(160, 160, "Click anywhere to start", {
            font: '30px Courier', fill: '#ffffff', align: "center", boundsAlignH: "center", boundsAlignV: "middle"
        });
        game.input.activePointer.capture = true;
    },
    update: function () {
        if (game.input.activePointer.isDown) {
            game.state.start('ShipView')
        }
    }
}