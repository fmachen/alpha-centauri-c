var app = require('http').createServer(handler).listen(8081);
var io = require('socket.io')(app);
var fs = require('fs');
var path = require('path');

function handler(request, response) {
    var filePath = '.' + request.url;
    if (filePath == './') {
        filePath = './index.html';
    }

    var extname = path.extname(filePath);
    var contentType = 'text/html';
    switch (extname) {
        case '.js':
            contentType = 'text/javascript';
            break;
        case '.css':
            contentType = 'text/css';
            break;
        case '.json':
            contentType = 'application/json';
            break;
        case '.png':
            contentType = 'image/png';
            break;
        case '.jpg':
            contentType = 'image/jpg';
            break;
        case '.wav':
            contentType = 'audio/wav';
            break;
    }

    fs.readFile(filePath, function (error, content) {
        if (error) {
            if (error.code == 'ENOENT') {
                fs.readFile('./404.html', function (error, content) {
                    response.writeHead(200, {'Content-Type': contentType});
                    response.end(content, 'utf-8');
                });
            }
            else {
                response.writeHead(500);
                response.end('Sorry, check with the site admin for error: ' + error.code + ' ..\n');
                response.end();
            }
        }
        else {
            response.writeHead(200, {'Content-Type': contentType});
            response.end(content, 'utf-8');
        }
    });
}

app.lastPlayderID = 0;
app.playersList = [];

io.on('connection', function (client) {
    console.log(client.id);
    client.send(client.id);
    client.on('newplayer', function (player) {
        console.log("newplayer");
        console.log(player);
        client.player = {
            id: app.lastPlayderID++,
            idSocket: client.id,
            x: player.x,
            y: player.y
        };
        client.broadcast.emit('newplayer', client.player);
    });
    client.on('move', function (data) {
        console.log(data);
        console.log('click to ' + data.x + ', ' + data.y);
        console.log(client.player);
        client.player.x = data.x;
        client.player.y = data.y;
        client.broadcast.emit('move', client.player);
    });

    client.on('getPlayers',function () {
        client.emit('allplayers', getAllPlayers());
    });

    client.on('disconnect', function () {
        console.log("disconnect");
        client.broadcast.emit('remove', client.id);
    });

    client.on('test', function () {
        console.log('test received');
    });
});

function getAllPlayers() {
    var players = [];
    Object.keys(io.sockets.connected).forEach(function (socketID) {
        var player = io.sockets.connected[socketID].player;
        if (player) players.push(player);
    });
    console.log("players", players);
    return players;
}

function randomInt(low, high) {
    return Math.floor(Math.random() * (high - low) + low);
}
