import React, { useEffect, useState, useCallback } from 'react';
import styled from 'styled-components';

interface Leyenda {
  id_leyenda: number;
  nombre: string;
  descripcion: string;
  imagen_url: string;
  fecha: string;
}

const Container = styled.section`
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  padding: 20px;
  background-color: #f4f4f9;
  max-width: 100%;
  margin: 0 auto;
  font-family: "Afacad Flux", sans-serif;

  @media (max-width: 1024px) {
    grid-template-columns: repeat(3, 1fr);
  }
  @media (max-width: 768px) {
    grid-template-columns: repeat(2, 1fr);
  }
  @media (max-width: 480px) {
    grid-template-columns: 1fr;
  }
`;

const Titulo = styled.h1`
  text-align: center;
  font-size: 36px;
  margin: 20px 0;
  font-family: "Afacad Flux", sans-serif;
  color: #333;
`;

const Cards = styled.div`
  width: 100%;
  height: 450px;
  margin: 15px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  padding: 15px;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

  &:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  }
`;

const Image = styled.img`
  width: 100%;
  height: 200px;
  object-fit: contain;
  border-radius: 8px;
`;

const Nombre = styled.h2`
  font-size: 20px;
  color: #333;
  margin-top: 15px;
  text-align: center;
`;

const Descripcion = styled.p`
  font-size: 16px;
  color: #555;
  margin-top: 5px;
  text-align: justify;
`;

const Fecha = styled.p`
  font-size: 14px;
  color: #888;
  margin-top: 10px;
`;

const MensajeError = styled.p`
  color: red;
  text-align: center;
  font-size: 16px;
`;

const ListaLeyendas = () => {
  const [leyendas, setLeyendas] = useState<Leyenda[]>([]);
  const [mensaje, setMensaje] = useState('');

 const fetchLeyendas = useCallback(() => {
  const url = 'http://localhost/proyecto/4thewords_frontend_Daniela_Araya/Backend/index.php/leyenda';
  fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error('Error en la respuesta del servidor');
      }
      return response.json();
    })
    .then((data) => {
      console.log('Datos recibidos:', data);
      if (Array.isArray(data)) {
        setLeyendas(data);
      } else {
        throw new Error('Formato de datos inválido');
      }
    })
    .catch((error) => {
      console.error('Error fetching data:', error);
      setMensaje('No se pudieron cargar las leyendas.');
    });
}, []);


  useEffect(() => {
    fetchLeyendas();
  }, [fetchLeyendas]);

  return (
    <>
      <Titulo>Leyendas Populares</Titulo>
      {mensaje && <MensajeError>{mensaje}</MensajeError>}
      <Container>
        {leyendas.map((leyenda) => (
          <Cards key={leyenda.id_leyenda}>
            <Image src={leyenda.imagen_url} alt={leyenda.nombre} />
            <Nombre>{leyenda.nombre}</Nombre>
            <Descripcion>{leyenda.descripcion}</Descripcion>
            <Fecha>{new Date(leyenda.fecha).toLocaleDateString()}</Fecha>
          </Cards>
        ))}
      </Container>
    </>
  );
};

export default ListaLeyendas;

