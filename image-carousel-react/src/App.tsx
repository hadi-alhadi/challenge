import React from "react";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "./App.css";
import Header from "./components/Header/header";
import Carousel from "./components/Carousel/carousel";

function App() {
  return (
    <div>
      <Header />
      <Carousel />
    </div>
  );
}

export default App;
