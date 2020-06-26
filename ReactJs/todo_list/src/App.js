import React from "react";
import "./App.css";
import Anime from "./components/animList/Anime";
import Header from "./components/Layout/Header";
import Foter from "./components/Layout/Foter";
function App() {
  return (
    <div className="App">
      <Header />
      <Anime />
      <Foter />
    </div>
  );
}

export default App;
