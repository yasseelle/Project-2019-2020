var exp=require('express')
var fiche=exp()
fiche.set("view engine","pug")
fiche.get('/',function(req,res){
    res.render("formulaire.pug")
})
fiche.listen(2020,function(){
    console.log("localhost:2020conecter")
})