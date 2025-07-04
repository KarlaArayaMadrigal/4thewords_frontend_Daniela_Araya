import React, { useState, useEffect } from "react";
import styled from "styled-components";

const Contenido = styled.div`
  background-color: #000;
  width: 100%;
  aspect-ratio: 6 / 1;
  position: relative;
  overflow: hidden;
  border-radius: 10px;
`;

const Imagen = styled.img`
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  opacity: ${(props) => (props.visible ? 1 : 0)};
  transition: opacity 1s ease-in-out;
`;

const Texto = styled.h2`
  color: #ffd700;
  font-family: Arial, sans-serif;
  font-size: 48px;
  text-align: center;
  position: relative;
  z-index: 2;
  margin-top: 0;
  padding-top: 20px;
  text-shadow: 0 0 10px rgba(255, 215, 0, 0.7);

`;

const Banner = () => {
  const images = [
    "/img/cadejos.jpg",
    "/img/padre.jpg",
    "/img/mona.jpg",
     "/img/monja.jpg",
    "/img/micomalo.jpg",
    "/img/LaSegua.jpg",
  ];

  const [index, setIndex] = useState(0);

  useEffect(() => {
    const timer = setTimeout(() => {
      setIndex((prev) => (prev + 1) % images.length);
    }, 3000);
    return () => clearTimeout(timer);
  }, [index, images.length]);

  return (
    <Contenido>
      {images.map((src, i) => (
        <Imagen key={i} src={src} alt={`Banner ${i + 1}`} visible={i === index} />
      ))}
      <Texto>¡Descubre las leyendas más terrorificas!</Texto>
    </Contenido>
  );
};

export default Banner;

