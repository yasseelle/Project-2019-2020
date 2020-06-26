var db = require('mysql');
var  cons = db.createConnection({host:"localhost",database:"xbase",user:"root",password:""});

cons.connect(function(err,resulat)
{
    if(err)throw err;
    console.log("connexion a la base");
    var req="CREATE TABLE table1(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, NOM VARCHAR(50),email VARCHAR(50))"
    cons.query(req,function(err,resulat)
    {
        if(err) throw err;
        console.log("table bien cree");
        
    }
    );
}

);