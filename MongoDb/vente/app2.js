var express = require("express");
mongoose = require("mongoose");
const app = express();
var router = express.Router();
const bodyParser = require("body-parser");
app.set("views", "./views");
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));
mongoose.connect("mongodb://localhost:27017/b12");

var produitSchema = new mongoose.Schema({
  titre: { type: String },
  prix: Number,
  categorie: { type: String },
});
var Produit = mongoose.model("Produit", produitSchema);

//acceuil
app.get("/", function (req, res) {
  res.render("acceuil");
});

app.get("/entree", function (req, res) {
  res.render("ajoutProdit");
});

//enregitrer dans la base par formulaire ajoutProduit.ejs
app.post("/nouveau", function (req, res) {
  var prd = {
    titre: req.body.titre,
    categorie: req.body.categorie,
    prix: req.body.prix,
  };
  var donnees = new Produit(prd);
  donnees.save();
  res.redirect("/resultat");
});
app.get("/resultat", function (req, res) {
  Produit.find().then(function (prds) {
    res.render("liste", { produits: prds });
  });
});
//afficher un enregistrement

app.get("/show/:id", function (req, res) {
  var id = req.params.id;
  console.log(id);
  Produit.findById(id, function (err, prd) {
    if (err) {
      console.log(err);
    } else {
      console.log(prd);
      res.render("show", { produits: prd });
    }
  });
});
//modification d'un enregistrement

app.get("/edit/:id", function (req, res) {
  var id = req.params.id;
  console.log(id);
  Produit.findById(id, function (err, prd) {
    if (err) {
      console.log(err);
    } else {
      console.log(prd);
      res.render("edit", { produits: prd });
    }
  });
});
//modification d'un enregistrement

app.post("/editer/:id", function (req, res) {
  var id = req.body.id;
  console.log("id_produit" + id);
  Produit.findById(id, function (err, prd) {
    if (err) {
      console.log(err);
    } else {
      prd.titre = req.body.titre;
      prd.categorie = req.body.categorie;
      prd.prix = req.body.prix;
      prd.save();
    }
  });
  res.redirect("liste");
});

app.get("/editer/:id", function (req, res) {
  Produit.find().then(function (prds) {
    res.render("liste", { produits: prds });
  });
});
app.listen(8886);
