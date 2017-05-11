var Client = {};
Client.socket = io.connect(window.location.href);

Client.sendTest = function () {
    console.log("test sent");
    Client.socket.emit('test');
};

Client.askNewPlayer = function () {
    Client.socket.emit('newplayer');
};

Client.sendClick = function (x, y) {
    Client.socket.emit('click', {x: x, y: y});
};

Client.socket.on('newplayer', function (data) {
    game.addNewPlayer(data.id, data.x, data.y);
});

Client.socket.on('allplayers', function (data) {
    for (var i = 0; i < data.length; i++) {
        game.addNewPlayer(data[i].id, data[i].x, data[i].y);
    }
});

Client.socket.on('move', function (data) {
    game.movePlayer(data.id, data.x, data.y);
});

Client.socket.on('remove', function (id) {
    game.removePlayer(id);
});
