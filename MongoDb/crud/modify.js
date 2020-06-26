var express = require("express");
var app = express();
var MongoClient = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";
MongoClient.connect(url, function (err, db) {
  if (err) throw err;
  var dbo = db.db("blog");
  var query = { name: "ahmed" };
  var nouveau = {
    $set: { name: "adnan", city: "azrou" },
  };
  //modifier table  tableutilisateur collection:
  dbo.collection("users").updateOne(query, nouveau, function (err, resultat) {
    if (err) throw err;
    console.log("element modifie");
    db.close();
  });
});
