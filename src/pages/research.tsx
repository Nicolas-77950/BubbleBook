import React, { useState } from 'react';
import './research.css';

interface SearchResult {
  name: string;
  address: string;
  category: string;
}

const Research: React.FC = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [results, setResults] = useState<SearchResult[]>([
    {
      name: "Nicolas Gragas",
      address: "13 avenue du Marechal Foch, Achères 78200, Yvelines",
      category: "Toiletteur pour chien"
    },
    {
      name: "Maxence VilletShoumaker",
      address: "27 rue du tourniquet, Magnanville 78200, Yvelines",
      category: "Toiletteur pour chien"
    },
    {
      name: "Amandine Petit",
      address: "7 avenue du grand Géant, Magnanville 78200, Yvelines",
      category: "Toiletteur"
    },
    {
      name: "Leo Gascuena",
      address: "58 avenue du Lyonnais, Magnanville 78200, Yvelines",
      category: "Toiletteur pour chat et chien"
    }
  ]);

  const handleSearch = () => {
    console.log("Searching for:", searchTerm);
    
    const filteredResults = results.filter(result => 
      result.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      result.address.toLowerCase().includes(searchTerm.toLowerCase()) ||
      result.category.toLowerCase().includes(searchTerm.toLowerCase())
    );
    setResults(filteredResults);
  };

  const ResultItem = ({ result }: { result: SearchResult }) => (
    <div className="result-item">
      <h3>{result.category}</h3>
      <p>{result.address}</p>
      <p>{result.name}</p>
    </div>
  );

  return (
    <div className="research-container">
      <div className="header">
        <div>Yvelines</div>
        <div>Ville</div>
        <div>Animaux</div>
        <div>Race</div>
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
      <div className="results">
        {results.map((result, index) => (
          <ResultItem key={index} result={result} />
        ))}
      </div>
    </div>
  );
};

export default Research;