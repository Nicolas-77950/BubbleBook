import React, { useState } from 'react';
import Connexion from './pages/connexion';

import './App.css';
import Register from './register'; 

const App: React.FC = () => {
  return (
    <div>
      <Connexion />

    <div className="App">
      <Register /> 
    </div>
    </div>
  )
}



export default App;