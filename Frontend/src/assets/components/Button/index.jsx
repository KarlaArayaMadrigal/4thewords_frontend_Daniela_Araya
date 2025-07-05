import styled from "styled-components";

const Container = styled.div`
  display: flex;
  justify-content: center;  /* centra horizontalmente */
  align-items: center;      /* centra verticalmente */
             /* altura completa de la ventana */
`;

const StyledButton = styled.button`
  background-color: #4caf50;
  color: white;
  padding: 12px 24px;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;

  &:hover {
    background-color: #388e3c;
  }
`;

const Button = () => {
  return (
    <Container>
      <StyledButton>Haz clic aquí</StyledButton>
    </Container>
  );
};

export default Button;

