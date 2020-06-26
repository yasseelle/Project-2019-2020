var db = require('mysql');
var con = db.createConnection({host:"localhost",user:"root",password:""});
con.connect(function(err)
{
    if(err)throw err;
console.log('connxion faite');
con.query("CREATE DATABASE xbase",function(err,resulat)
{
    if(err)throw err;
    console.log('database cree');
}
);

});

