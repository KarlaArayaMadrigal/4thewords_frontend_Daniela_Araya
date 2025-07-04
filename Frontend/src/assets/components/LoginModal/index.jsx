import React, { useState } from "react";
import styled from "styled-components";

const ModalOverlay = styled.div`
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 999;
`;

const ModalContent = styled.div`
  background: rgba(255, 255, 255, 0.85);
  padding: 2rem;
  border-radius: 12px;
  width: 100%;
  max-width: 400px;
  backdrop-filter: blur(8px);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
`;


const Input = styled.input`
  width: 100%;
  margin-bottom: 1rem;
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 6px;
`;

const Button = styled.button`
  width: 100%;
  padding: 0.75rem;
  background-color: #007bff;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  &:hover {
    background-color: #0056b3;
  }
`;

const Error = styled.p`
  color: red;
  margin-bottom: 1rem;
`;

const LoginModal = ({ onClose, onLogin }) => {
  const [correo, setCorreo] = useState("");
  const [contrasena, setContrasena] = useState("");
  const [error, setError] = useState("");

  const handleLogin = async () => {
    try {
      const response = await fetch("http://localhost:8080/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ correo, contrasena }),
      });

      const data = await response.json();

      if (!response.ok) {
        setError(data.detail || "Correo o contraseña incorrectos");
        return;
      }


      localStorage.setItem("token", data.token);


      onLogin(data.token);


      onClose();
    } catch (err) {
      setError("Error al conectar con el servidor");
    }
  };

  return (
    <ModalOverlay>
      <ModalContent>
        <h2>Iniciar sesión</h2>
        {error && <Error>{error}</Error>}
        <Input
          type="email"
          placeholder="Correo"
          value={correo}
          onChange={(e) => setCorreo(e.target.value)}
        />
        <Input
          type="password"
          placeholder="Contraseña"
          value={contrasena}
          onChange={(e) => setContrasena(e.target.value)}
        />
        <Button onClick={handleLogin}>Iniciar sesión</Button>
      </ModalContent>
    </ModalOverlay>
  );
};

export default LoginModal;
