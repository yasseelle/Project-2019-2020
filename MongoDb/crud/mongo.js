var mg = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/mabase";
mg.connect(url, function (err, db) {
  if (err) throw err;
  console.log("crée");
  db.close();
});
