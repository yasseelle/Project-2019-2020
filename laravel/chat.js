var http=require('http');
var fs = require('fs');
var serveur = http.createServer(function(res,req)
{
    fs=FileReader('index.html','UTF-8',function(err,content)
    {
        req.write(2020,{"content-type":"text/html"});
        req.end(content);
    });
});
var io=require('socket.io').listen(serveur);
io.sockets.on('connection',function()
{
    console.log('une internet ey connecté');
}
);
serveur.listen(2020);
