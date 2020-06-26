var express = require("express");
var app = express();
var MongoClient = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";
MongoClient.connect(url, function (err, db) {
  if (err) throw err;
  var dbo = db.db("blog");
  var query = { age: 25 };
  var nouveau = { $set: { city: "fes" } };
  dbo.collection("users").updateMany(query, nouveau, function (err, resultat) {
    if (err) throw err;
    console.log(resultat.result.nModified + " elements(s) modifiés");
    db.close();
  });
});
