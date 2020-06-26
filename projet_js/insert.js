var db=require('mysql')
var con=db.createConnection({host:"localhost",password:"",user:"root",database:"xbase"});
con.connect(function(err,resultat)
{
    if(err)throw err;
    console.log("ben connecter");

});
var sql = "INSERT INTO table1 VALUES(0,'karim','email@email')";
con.query(sql,function(err,resultat)
{
    if(err)throw err;
    console.log("bien ajouter");
  
}

);