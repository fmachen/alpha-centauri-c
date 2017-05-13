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

Client.getPlayers = function () {
    Client.socket.emit('getPlayers');
};



Client.socket.on('message',function(data){
    game.me = data;
});

Client.socket.on('newplayer', function (data) {
    console.log('newplayer', data);

    Player.add(data.idSocket, data.x, data.y);
});

Client.socket.on('allplayers', function (data) {
    for (var i = 0; i < data.length; i++) {
        if(data[i].idSocket != game.me){
            continue;
        }
        Player.add(data[i].idSocket, data[i].x, data[i].y);
    }
});

Client.socket.on('move', function (data) {
    console.log('Player '+data.idSocket+' moving !');
    Player.move(data.idSocket, data.x, data.y);
});

Client.socket.on('remove', function (id) {
    console.log('remove',id);
    Player.remove(id);
});
