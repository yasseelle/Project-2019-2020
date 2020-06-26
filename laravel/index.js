
var ap = require('express');
var page=ap();
var http=require('http').createServer(page);
 page.get('/',function(res,req)
{
    req.sendFile('INDEX.HTML');

});
http.listen(2020,function()
{
    console.log('le lien localhost:2020');
}
);