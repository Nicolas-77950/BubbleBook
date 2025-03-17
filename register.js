document.querySelector('form').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch('registerAjax.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === 200) {
            alert(result.message);
            document.getElementById('inscriptionForm').reset();
            window.location.href = 'connexion.php'; //redirection on the connexion page
        } else {
            alert(result.message); 
        }
    } catch (error) {
        console.error('Erreur :', error);
        alert('Une erreur est survenue.');
    }
});