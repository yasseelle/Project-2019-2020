var exp = require('express');
var fich = exp();
fich.set("View engine","pug");
fich.get("/",function(req,res)
{
    res.render("Formulair.pug");
    
}
);
fich.listen(2020,function()
{
    console.log("localhost:2020 connecté");
}

);