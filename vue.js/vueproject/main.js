new Vue({
  el: "#app",
  data: {
    info: "hello",
    message: false,
    divstyle: "background:#000;color:#fff;margin:50px",
    nom: "",
    lastnames: ["ilyass", "jabbari", "alami", "idrissi"],
  },
  methods: {
    addlastname() {
      this.lastnames.push("ahmed");
      this.message = true;
      this.nom = this.lastnames.length;
    },
  },
});
