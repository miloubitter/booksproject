document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('createBookForm');
    const inputTitle = document.getElementById('title');
    const inputFields = form.querySelectorAll('input, textarea');

    form.addEventListener('submit', (event) =>{

        for(let i = 0; i < inputFields.length; i++){
            if (!inputFields[i].checkValidity()){
                addErrorMessageForElement(inputFields[i]);
            } else {
                clearErrorMessageForElement(inputFields[i]);
            }
        }

        event.preventDefault();

        if (form.checkValidity()) {

            const book = {
              title: form.title.value,
              author_id: form.author_id.value,
              category_id: form.category_id.value,
              isbn: form.isbn.value,
              price: form.price.value,
              description: form.description.value,
            };
            createBook(book)
                .done((data,text)=> {
                    form.reset();

                    //appendSuccessMessage('Book successfully added!', '.message-container');
                    window.location.replace("?route=show&id=" + JSON.parse(data));

                    console.log(JSON.parse(data));

                })
                .fail((request, status, error) => {
                    console.log(request);
                });
        }
    });

    inputTitle.addEventListener('blur', (event) =>{
       if (event.target.value.length < 5 && inputTitle.checkValidity()) {
           event.target.setCustomValidity('Titel moet meer dan 4 karakters bevatten');
       } else {
           event.target.setCustomValidity('');
       }
    });

    const fieldValidation = (event) => {
        const inputField = event.target;

        if (!inputField.checkValidity()) {
            addErrorMessageForElement(inputField);
        }else {
            clearErrorMessageForElement(inputField);
        }
    };
    for(let i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener('blur', fieldValidation);
    }

    const addErrorMessageForElement = (element) => {
        clearErrorMessageForElement(element);

        const parent = element.parentNode;

        const errorMessage = getErrorMessageForElement(element);

        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = errorMessage;

        parent.appendChild(errorDiv);
    };

    const clearErrorMessageForElement = (element) => {
        const parent = element.parentNode;

        const errorDiv = parent.querySelector('div.error-message');
        if (errorDiv) {
            parent.removeChild(errorDiv);
        }
    };

    const getErrorMessageForElement = (element) => {
        if (element.validity.customError) {
            return element.validationMessage;
        } else if (element.validity.valueMissing) {
            return 'Dit veld is verplicht';
        } else {
            return 'Dit veld is onjuist gevuld';
        }
    };


});