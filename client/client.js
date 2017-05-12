var client = {};
client.socket = io.connect(window.location.href);

client.sendTest = function () {
    console.log("test sent");
    client.socket.emit('test');
};

client.askNewPlayer = function () {
    client.socket.emit('newplayer');
};

client.sendClick = function (x, y) {
    client.socket.emit('click', {x: x, y: y});
};

client.socket.on('newplayer', function (data) {
    Player.add(data.id, data.x, data.y);
});

client.socket.on('allplayers', function (data) {
    for (var i = 0; i < data.length; i++) {
        Player.add(data[i].id, data[i].x, data[i].y);
    }
});

client.socket.on('move', function (data) {
    Player.move(data.id, data.x, data.y);
});

client.socket.on('remove', function (id) {
    Player.remove(id);
});
