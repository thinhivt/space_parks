var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(8809);
io.on('connection', function (socket) {
  console.log("new client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('status');

  redisClient.on("status", function(channel, status) {
    console.log("mew message in queue "+ status + "channel");
    socket.emit(channel, status);
  });

  socket.on('disconnect', function() {
    redisClient.quit();
  });

});
