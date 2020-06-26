var express = require('express');
var page =express();

page.get('/page1',function(res,req)
{       

    res.send('<h2 style="color:red">page dinscription</h2>');

}
);
page.listen(8090);
