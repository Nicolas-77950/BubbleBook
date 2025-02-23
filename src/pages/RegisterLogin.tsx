import React from 'react';
import "./RegisterLogin.css";
import HeaderPages from './headerPages';
import { Link } from 'react-router-dom';

const RegisterLogin: React.FC = () => {
  return (
    <div>
      <HeaderPages />
      <div className="page-container">

        <div className="form-container">
          <h2>Inscrivez-vous ou connectez-vous</h2>

          <div className="auth-section">
            <a className="auth-text"><h3>Nouveau sur BlueBook ?</h3></a>
            <button className="signup-btn">
              <Link to="/register">S'inscrire</Link>
            </button>
          </div>

          <div className="auth-section">
            <a className="auth-text"><h3>J'ai déjà un compte BlueBook</h3></a>
            <button className="login-btn">
              <Link to="/connexion">Se connecter</Link>
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RegisterLogin;
