import React from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom";

import Connexion from './pages/connexion';
import Register from './pages/register'; 
import RegisterLogin from './pages/RegisterLogin';

import './App.css';

const App: React.FC = () => {
  return (
    <Routes>
      <Route path="/" element={<Navigate to="/connexion" />} />
      <Route path="/" element={<Navigate to="/register" />} />
      <Route path="/" element={<Navigate to="/RegisterLogin" />} />

      <Route path="/connexion" element={<Connexion />} />
      <Route path="/register" element={<Register />} />
      <Route path="/RegisterLogin" element={<RegisterLogin />} />
    </Routes>
  );
}

export default App;