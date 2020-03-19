var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(8081);
io.on('connection', function (socket) {
  console.log("new client connected");
  io.emit('message', 'hello');
  var redisClient = redis.createClient();
  //console.log(redisClient);
  redisClient.subscribe('message');
  redisClient.on("message", function() {
    console.log("mew message in queue "+ message + "channel");
    socket.emit(channel, message);
  });
  
  socket.on('disconnect', function() {
    redisClient.quit();
  });

});


///////////////////////////////////////////////
/*var io =require('socket.io')(6000)
console.log('connected to port 6000')
io.on('error', function(socket){
  console.log('error')
})
io.on('connection', function(socket){
  console.log('co nguoi vua ket noi')
})

var redis = require('redis')
var redis = new Redis(1000)

redis.on('message' function(partner, channel, message){
  console.log(channel)
  console.log(partner)
  console.log(message)

})*/
