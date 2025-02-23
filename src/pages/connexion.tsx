import React, { useState } from 'react';
import './connexion.css';
import HeaderPages from './headerPages';


const Connexion: React.FC = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    return (
        <div>
            <HeaderPages />
            <div className="Connexion">
                <div className='textConnexion'>
                    <h2>Connexion</h2>
                </div>
                <div className='postConnexion'>
                    <><form action="POST">
                        <div className='Email'>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Mail"
                                value={email}
                                onChange={(e) => setEmail(e.target.value)}
                                required
                            />
                        </div>
                        <div className='Password'>
                            <input
                                type="password"
                                id = "password"
                                name="password"
                                placeholder="Mot de Passe"
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                                required
                            />
                        </div>
                        <div className='Submit'>
                            <button type="submit">Se connecter</button>
                        </div>
                        <p className="signup">
                        Aucun compte ? <a href="#">Inscription</a>
                        </p>
                    </form></>
                </div>
            </div>
        </div>
    );
  };

export default Connexion;
