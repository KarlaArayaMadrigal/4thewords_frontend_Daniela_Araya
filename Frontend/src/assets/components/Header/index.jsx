import styled, { createGlobalStyle } from "styled-components";
import BarraNavegacion from "../Navbar";
import Button from "../Button";

const GlobalStyle = createGlobalStyle`
  @import url('https://fonts.googleapis.com/css2?family=Are+You+Serious&family=Mystery+Quest&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
`;

const Contenido = styled.div`
  display: flex;
  background-color: #101025;
  width: 100%;
  height: 140px;
  justify-content: space-between;
  align-items: center;
  padding: 0 40px;
`;

const Distintivo = styled.div`
  display: flex;
  align-items: center;
`;

const Logo = styled.div`
  width: 100px;
  height: 100px;
  background-image: url("/img/costa-rica.png");
  background-size: cover;
  background-position: center;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
`;

const Titulo = styled.h3`
  font-family: "Mystery Quest", cursive;
  display: flex;
  align-items: center;
  font-size: 40px;
  color: white;
  margin-left: 20px;
`;

const Header = () => {
  return (
    <div>
      <GlobalStyle />
      <Contenido>
        <Distintivo>
          <Logo>
            <img
              src="/img/logo.png"
              alt="Logo"
              style={{ width: "80px", height: "auto" }}
            />
          </Logo>
          <Titulo>Leyendas CR</Titulo>
        </Distintivo>
          <Button/>
        <BarraNavegacion />
      </Contenido>
    </div>
  );
};

export default Header;
