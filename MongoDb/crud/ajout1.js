var mongo = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";
var utilisateur = {
  id: 1,
  nom: "jabbari",
  tache: "admin",
};

mongo.connect(url, (err, db) => {
  if (err) throw err;
  else {
    var dbo = db.db("maBase");
    dbo.collection("maTable").insert(utilisateur, (err, res) => {
      if (err) throw err;
      else {
        console.log("nombre d'utilisateurs ajoutée est " + res.insertedCount);
      }
      db.close();
    });
  }
});
