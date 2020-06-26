var db=require('mysql')
var con=db.createConnection({host:"localhost",password:"",user:"root",database:"xbase"});
con.connect(function(err,resultat)
{
    if(err)throw err;
    console.log("bien connecter");

});
var sql = "SELECT * FROM table1";
con.query(sql,function(err,resultat)
{
    if(err)throw err;
    Object.keys(resultat).forEach(function(k)
    {
        var l =resultat[k];
        console.log(l.NOM+" "+l.email);
        
    }
    
    );
}
);