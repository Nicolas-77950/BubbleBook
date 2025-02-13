import React from 'react';
import Connexion from './pages/connexion';

import './App.css';
import Register from './pages/register'; 

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