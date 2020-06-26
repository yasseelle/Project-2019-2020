var mongo = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";

mongo.connect(url, (err, db) => {
  if (err) throw err;
  else {
    var dbo = db.db("maBase");
    dbo
      .collection("maTable")
      .find()
      .toArray((err, res) => {
        if (err) throw err;
        else {
          console.log(res);
        }
        db.close();
      });
  }
});
