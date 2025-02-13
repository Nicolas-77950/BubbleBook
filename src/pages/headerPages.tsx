import React from 'react';
import './headerPages.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBook } from '@fortawesome/free-solid-svg-icons';
import logo from '../Images/Design_sans_titre-removebg-preview.png'

const HeaderPages: React.FC = () => {
    return (
        <header>
            <nav className='navbarre'>
                <div className='logoDiv'>
                    <a href='#' className='logo'><img src={logo} alt="Icone de l'application BubbleBook"/></a>
                    <a href="#"><h3>BubbleBook</h3></a>
                </div>
                <div className='nav'>
                    <div >
                        <a href="#"><h3>Vous êtes toiletteur ?</h3></a>
                    </div>
                    <a href="#"><FontAwesomeIcon icon={faBook} /></a>
                    <a className='connect' href="#"><h3>Se connecter</h3></a>
                </div>
            </nav>
        </header>
    );
};

export default HeaderPages;