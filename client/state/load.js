var loadState = {
    preload: function () {
        var loadingLabel = game.add.text(160, 160, 'loading...', {
            font: '30px Courier', fill: '#fff', align: "center", boundsAlignH: "center", boundsAlignV: "middle"
        });

        game.stage.backgroundColor = '#000';

        /**** Load graphics assets ****/

        /**** Load audio assets ****/

    },
    create: function () {
        window.setTimeout(function () {
            game.state.start('title');
        }, 1000);
    }
};