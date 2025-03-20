document.querySelector('form').addEventListener('submit', async function (event) {
    event.preventDefault();
    
    const formData = new FormData(this);

    try {
        const response = await fetch('Login/loginAjax.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === 200) {
            console.log("ça fonctionne");
            alert("ça fonctionne");
        } else {
            console.log("ça fonctionne pas :(")
        }
    } catch (error) {
        console.error("Erreur lors de la requête POST :", error);
    }
})