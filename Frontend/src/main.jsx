import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

import App from './App';
import Login from './assets/pages/login';

const root = document.getElementById('root');

createRoot(root).render(
  <StrictMode>
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/home" element={<App />} />
      </Routes>
    </Router>
  </StrictMode>
);

