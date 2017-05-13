var Client = {};
Client.socket = io.connect(window.location.href);


Client.sendTest = function () {
    console.log("test sent");
    Client.socket.emit('test');
};

Client.sendNewPlayer = function (player) {
    console.log(player);
    Client.socket.emit('newplayer',player);
};

Client.sendMove = function (x, y) {
    Client.socket.emit('move', {x: x, y: y});
};



Client.socket.on('message',function(data){
    console.log(data);
});

Client.socket.on('newplayer', function (data) {
    console.log('newplayer');
    Player.add(data.id, data.x, data.y);
});

Client.socket.on('allplayers', function (data) {
    for (var i = 0; i < data.length; i++) {
        Player.add(data[i].id, data[i].x, data[i].y);
    }
});

Client.socket.on('move', function (data) {
    Player.move(data.id, data.x, data.y);
});

Client.socket.on('remove', function (id) {
    Player.remove(id);
});
