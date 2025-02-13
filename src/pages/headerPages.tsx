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
                    <a href="#">BubbleBook</a>
                </div>
                <div className='nav'>
                    <div>
                        <a href="#">Vous êtes toiletteur</a>
                    </div>
                    <a href="#"><FontAwesomeIcon icon={faBook} /></a>
                    <div>
                        <a href="#">Profil</a>
                    </div>
                </div>
            </nav>
        </header>
    );
};

export default HeaderPages;