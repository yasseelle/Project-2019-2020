var express = require("express");
var app = express();
var MongoClient = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";
var htmlParseur = require("body-parser");
var cheminParseur = htmlParseur.urlencoded({ extended: false });
app.use(express.static("public"));
app.get("/public", function (req, res) {
  res.sendFile(__dirname + "/" + "index.html");
});
app.post("/affichage-", cheminParseur, function (req, res) {
  utilisateur = {
    id: req.body.id,
    nom: req.body.nom,
    tache: req.body.tache,
  };
  res.end(JSON.stringify(utilisateur));
  MongoClient.connect(url, function (err, db) {
    if (err) throw err;
    var dbo = db.db("mabase");
    dbo.collection("matable").insert(utilisateur, function (err, res) {
      if (err) throw err;
      console.log("nombre des utilisateurs ajoutés: " + res.insertedCount);
      db.close();
    });
  });
});

app.get("/afficher", function (req, res) {
  MongoClient.connect(url, function (err, client) {
    if (!err) {
      const db = client.db("mabase");
      const collection = db.collection("matable");
      collection.find({}).toArray(function (err, resultat) {
        if (!err) {
          var sortie =
            "<html><header><title>html mongdb express</title></header><body>";
          sortie += "<h1>Liste des utilisateurs</h1>";
          sortie +=
            "<table border='1'>" +
            "<tr>" +
            "<th>" +
            "nom" +
            "</th>" +
            "<th>" +
            "tache" +
            "</th></tr>" +
            "<tbody>";
          resultat.forEach(function (donnees) {
            sortie +=
              "<tr>" +
              "<td>" +
              donnees.nom +
              "</td>" +
              "<td>" +
              donnees.tache +
              " </td>" +
              "</tr>";
          });
          sortie += "</tbody>" + "</table>" + "</body>" + "</html>";
          res.send(sortie);
        }
      });
      client.close();
    }
  });
});

app.listen(3500);
