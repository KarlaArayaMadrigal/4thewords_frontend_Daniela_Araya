import { createGlobalStyle } from "styled-components";
import Header from "./assets/components/Header";
import Banner from "./assets/components/Banner";

const GlobalStyle = createGlobalStyle`
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
`;

function App() {
  return (
    <>
      <GlobalStyle />
      <Header />
      <Banner />
    </>
  );
}

export default App;
