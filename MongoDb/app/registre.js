var express = require("express");
const app = express();
const MongoClient = require("mongodb").MongoClient;
const dburl = "mongodb://localhost:27017";
const dbnom = "users";
const collnom = "user";
const bodyParser = require("body-parser");
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static("public"));
app.get("/public", function (request, response) {
  response.sendFile(__dirname + "/" + "register.html");
});

MongoClient.connect(dburl, { useUnifiedTopology: true })
  .then((client) => {
    const db = client.db(dbnom);
    const matable = db.collection(collnom);

    console.log("Connected to Database");
    app.post("/registre", (req, res) => {
      matable
        .insertOne(req.body)
        .then((result) => {
          console.log(result);
        })
        .catch((error) => console.error(error));
    });
  })
  .catch((error) => console.error(error));
app.listen(9200);
