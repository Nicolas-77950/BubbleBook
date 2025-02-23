import React from 'react';
import "./RegisterLogin.css";
import HeaderPages from './headerPages';

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
              <a href="#">S'inscrire</a>
            </button>
          </div>

          <div className="auth-section">
            <a className="auth-text"><h3>J'ai déjà un compte BlueBook</h3></a>
            <button className="login-btn">
              <a href="#">Se connecter</a>
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RegisterLogin;
