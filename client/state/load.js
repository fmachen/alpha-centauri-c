var loadState = {
    preload: function () {
        var loadingLabel = game.add.text(160, 160, 'loading...', {
            font: '30px Courier', fill: '#fff', align: "center", boundsAlignH: "center", boundsAlignV: "middle"
        });

        game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
        game.scale.PageAlignHorizonally = true;
        game.scale.PageAlignVertically = true;
        game.stage.backgroundColor = '#000';

        /**** Load graphics assets ****/

        /**** Load audio assets ****/

    },
    create: function () {
        game.state.start('title');
    }
};