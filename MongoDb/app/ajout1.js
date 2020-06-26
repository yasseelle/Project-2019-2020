var express = require("express");
var app = express();
var mongo = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";
var utilisateur = {
  nom: "imad",
  tache: "sortie",
};

mongo.connect(url, (err, db) => {
  if (err) throw err;
  else {
    var dbo = db.db("users");
    dbo.collection("user").insertOne(utilisateur, (err, res) => {
      if (err) throw err;
      else {
        console.log("nombre d'utilisateurs ajoutée est " + res.insertedCount);
      }
      db.close();
    });
  }
});
