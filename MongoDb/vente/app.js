var express = require("express");
mongoose = require("mongoose");
const app = express();
var router = express.Router();
const bodyParser = require("body-parser");
app.set("views", "./views");
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));
//.........................................................................
mongoose.connect("mongodb://localhost:27017/produis");
var produitSchema = new mongoose.Schema({
  prdId: String,
  titre: { type: String },
  prix: Number,
});
//.........................................................................
var Produit = mongoose.model("produit", produitSchema);
app.get("/", function (req, res) {
  res.render("ajoutproduit.ejs");
});
//.........................................................................
app.post("/vue", function (req, res) {
  new Produit({
    prdId: req.body.Idproduit,
    titre: req.body.titreproduit,
    prix: req.body.prix,
  }).save(function (err, prd) {
    if (err) res.json(err);
    else res.send("le produit est ajoute avec success !");
  });
});
//...............................................................................
app.get("/affichage", function (req, res) {
  Produit.find({}, function (err, prds) {
    console.log("\nProduits !");
    console.log(prds);
    renderResult(res, prds, "liste produits :");
  });
});

function renderResult(res, prds, msg) {
  res.render("liste.ejs", { message: msg, produits: prds }, function (
    err,
    result
  ) {
    if (!err) {
      res.end(result);
    } else {
      res.end("une erreur est survenue");
      console.log(err);
    }
  });
}
app.listen(8882);
