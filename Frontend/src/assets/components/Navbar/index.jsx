import styled from "styled-components";
import { Link } from "react-router-dom";

const Nav = styled.nav`
  display: flex;
  gap: 20px;
`;

const NavLink = styled(Link)`
  color: white;
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
  position: relative;

  &:hover {
    color: #ffd700;
  }

  &::after {
    content: '';
    display: block;
    width: 0%;
    height: 2px;
    background: #ffd700;
    transition: width 0.3s;
    position: absolute;
    bottom: -4px;
    left: 0;
  }

  &:hover::after {
    width: 100%;
  }
`;

const Navbar = () => {
  return (
    <Nav>
      <NavLink to="/">Inicio</NavLink>
      <NavLink to="/leyendas">Leyendas</NavLink>
      <NavLink to="/lugares">Lugares</NavLink>
      <NavLink to="/contacto">Contacto</NavLink>
    </Nav>
  );
};

export default Navbar;
