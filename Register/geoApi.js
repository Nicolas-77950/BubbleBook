document.addEventListener('DOMContentLoaded', function() {
    fetch('https://geo.api.gouv.fr/departements')
        .then(response => response.json())
        .then(data => {
            const departmentSelect = document.getElementById('department');
            data.forEach(department => {
                const option = document.createElement('option');
                option.value = department.code;
                option.textContent = `${department.nom} (${department.code})`;
                departmentSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erreur lors du chargement des départements :', error);
        });

    const isGroomerCheckbox = document.getElementById('is_groomer');
    const departmentSelect = document.getElementById('department');
    const citySelect = document.getElementById('city');

    isGroomerCheckbox.addEventListener('change', function() {
        if (this.checked) {
    
            departmentSelect.required = true;
            citySelect.required = true;
        } else {

            departmentSelect.required = false;
            citySelect.required = false;
            departmentSelect.value = '';
            citySelect.innerHTML = '<option value="">Sélectionnez d\'abord un département</option>';
            citySelect.disabled = true;
        }
    });

    departmentSelect.addEventListener('change', function() {
        const departmentCode = this.value;

        if (departmentCode) {
            fetch(`https://geo.api.gouv.fr/departements/${departmentCode}/communes`)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">Sélectionnez une ville*</option>';
                    data.forEach(commune => {
                        const option = document.createElement('option');
                        option.value = commune.nom;
                        option.textContent = commune.nom;
                        citySelect.appendChild(option);
                    });
                    citySelect.disabled = false;
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des communes :', error);
                });
        } else {
            citySelect.innerHTML = '<option value="">Sélectionnez d\'abord un département</option>';
            citySelect.disabled = true;
        }
    });
});