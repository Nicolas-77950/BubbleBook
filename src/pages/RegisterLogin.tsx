import React from 'react';
import "./RegisterLogin.css";

const RegisterLogin: React.FC = () => {
  return (
    <div className="page-container">

      <div className="form-container">
        <h2>Inscrivez-vous ou connectez-vous</h2>

        <div className="auth-section">
          <p className="auth-text">Nouveau sur BlueBook ?</p>
          <button className="signup-btn">
            <a href="#">S'inscrire</a>
          </button>
        </div>

        <div className="auth-section">
          <p className="auth-text">J'ai déjà un compte BlueBook</p>
          <button className="login-btn">
            <a href="#">Se connecter</a>
          </button>
        </div>
      </div>
    </div>
  );
};

export default RegisterLogin;
