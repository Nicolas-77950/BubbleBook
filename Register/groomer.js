const isGroomerCheckbox = document.getElementById('is_groomer');
    const groomerFields = document.getElementById('groomer-fields');
    const groomerInputs = groomerFields.querySelectorAll('input');

    isGroomerCheckbox.addEventListener('change', function() {
      if (this.checked) {
        // display the form with a transition
        groomerFields.style.opacity = '1';
        groomerFields.style.maxHeight = '500px';
        groomerInputs.forEach(input => {
            input.setAttribute('required', true);
          });
      } else {
        // hide it if it's not coched
        groomerFields.style.opacity = '0';
        groomerFields.style.maxHeight = '0';
        groomerInputs.forEach(input => {
            input.removeAttribute('required');
          });
      }
    });