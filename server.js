var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io').listen(server);

app.use('/assets', express.static(__dirname + '/assets'));
app.use('/client', express.static(__dirname + '/client'));

app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});

server.listen(8081, function () {
    console.log('Listening on ' + server.address().port);
});
