import React, { useState } from 'react';
import './research.css';

const Research: React.FC = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [results, setResults] = useState([]); 

    const handleSearch = () => {
        
    };

    return (
        <div className="research-container">
            <div className="header">
                
            </div>
            <div className="search-bar">
                <input 
                    type="text" 
                    placeholder="Rechercher" 
                    value={searchTerm} 
                    onChange={(e) => setSearchTerm(e.target.value)} 
                />
                <button onClick={handleSearch}>Rechercher</button>
            </div>
            <div 
            className="results">
                
            </div>
        </div>
    );
};

export default Research;