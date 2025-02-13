import React, { useState } from 'react';
import './register.css';

const Register: React.FC = () => {
  const [isToilettor, setIsToilettor] = useState(0); 
  const [email, setEmail] = useState('');
  const [name, setName] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const handleSubmit = async (event: React.FormEvent) => {
    event.preventDefault();

    const user = {
      email,
      password,
      first_name: name,
      id_groomer: isToilettor, 
    };

    try {
      const response = await fetch('http://localhost:5000/api/user/insert', {
        method: "POST",
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(user),
      });

      if (response.ok) {
        const data = await response.json();
        console.log('User inserted with ID:', data.id);
      } else {
        console.error('Failed to insert user');
      }
    } catch (error) {
      console.error('Error:', error);
    }

    if (password !== confirmPassword) {
      alert("C'est pas le même mot de passe sale caca.");
      return;
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Inscription</h2>

      <label htmlFor="toilettor">
        Vous êtes toiletteur ?
        <input
          type="checkbox"
          id="toilettor"
          checked={isToilettor === 1} 
          onChange={(e) => setIsToilettor(e.target.checked ? 1 : 0)} 
        />
      </label>

      <input
        placeholder='Saisissez votre email'
        type="email"
        id="email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
        required
      />

      <input
        placeholder='Saisissez votre nom/prenom'
        type="text"
        id="name"
        value={name}
        onChange={(e) => setName(e.target.value)}
        required
      />

      <input
        placeholder='Saisissez votre mot de passe'
        type="password"
        id="password"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        required
      />

      <input
        placeholder='Confirmer votre mot de passe'
        type="password"
        id="confirmPassword"
        value={confirmPassword}
        onChange={(e) => setConfirmPassword(e.target.value)}
        required
      />

      <button type="submit">S'inscrire</button>
    </form>
  );
};

export default Register;