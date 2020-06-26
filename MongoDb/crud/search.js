var MongoClient = require("mongodb").MongoClient;
var express = require("express");
var app = express();
var url = "mongodb://localhost:27017/";
MongoClient.connect(url, function (err, db) {
  if (err) throw err;
  var dbo = db.db("blog");
  var query = { name: "ilyass" };
  dbo
    .collection("users")
    .find(query)
    .limit(3)
    .toArray(function (err, resultat) {
      if (err) throw err;
      console.log(resultat);
      db.close();
    });
});
