var express = require('express');
var page =express();
page.get('/',function(req,res)
{
    res.setHeader('Content-type','text/html');
    res.send('<h2>cours express js</h2>');
    
}

);
page.listen(8090);
