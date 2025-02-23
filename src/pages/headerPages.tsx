import React, { useEffect, useState, useRef } from 'react';
import './headerPages.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBook, faBars, faTimes } from '@fortawesome/free-solid-svg-icons';
import logo from '../Images/Design_sans_titre-removebg-preview.png'

const HeaderPages: React.FC = () => {
    const [isOpen, setIsOpen] = useState<boolean>(false);
    const menuRef = useRef<HTMLDivElement | null>(null);

    useEffect(() => {
        console.log("État du menu burger:", isOpen);

        const handleClickOutside = (event: MouseEvent | TouchEvent) => {
            if (menuRef.current && !menuRef.current.contains(event.target as Node)) {setIsOpen(false)};
        };

        if (isOpen) {
            document.addEventListener("mousedown", handleClickOutside);
            document.addEventListener("touchstart", handleClickOutside);
        };

        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
            document.removeEventListener("touchstart", handleClickOutside);

        };
    }, [isOpen]);

    return (
        <header>
            <nav className='navbarre'>
                <div className='logoDiv'>
                    <a href='#' className='logo'><img src={logo} alt="Icone de l'application BubbleBook"/></a>
                    <a href="#"><h2>BubbleBook</h2></a>
                </div>

                <div className='nav'>
                    <div >
                        <a href="#"><h2>Vous êtes toiletteur ?</h2></a>
                    </div>
                    <a href="#"><FontAwesomeIcon icon={faBook} size="lg" /></a>
                    <a className='connect' href="#"><h2>Se connecter</h2></a>
                </div>

                <div className='burgerNav' ref={menuRef}>
                    <button onClick={() => setIsOpen(!isOpen)} className='burgerButton' aria-label="Ouvrir le menu">
                        <FontAwesomeIcon icon={faBars} size='2x'/>
                    </button>

                    {isOpen && (
                        <div className='burgerMenu'>
                            <div className='cross' onClick={() => setIsOpen(false)}><FontAwesomeIcon icon={faTimes} size='lg'/></div>
                            <div className='redirectionPage'> 
                                <a href="#" onClick={() => setIsOpen(false)}><h3>Vous êtes toiletteur ?</h3></a>
                                <a href="#" onClick={() => setIsOpen(false)}><h3>Agenda</h3></a>
                                <a href="#" onClick={() => setIsOpen(false)}><h3>Se connecter</h3></a>
                            </div>
                        </div>
                    )}
                </div>
            </nav>
        </header>
    );
};

export default HeaderPages;