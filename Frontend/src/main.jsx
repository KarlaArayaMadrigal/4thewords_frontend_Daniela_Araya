import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

import App from './App';
import Login from './assets/views/Login';
import Leyendas from './assets/views/Leyendas';
import Lugares from './assets/views/Lugares';

const root = document.getElementById('root');

createRoot(root).render(
  <StrictMode>
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/home" element={<App />} />
        <Route path="/leyendas" element={<Leyendas />} />
        <Route path="/lugares" element={<Lugares />} />
      </Routes>
    </Router>
  </StrictMode>
);

