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
              author_id: form.author.value,
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

    for(let i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener('blur', fieldValidation);
    }
    getAuthors()
        .done((data, text) => {

            let authors = JSON.parse(data);
            const authorRow = document.querySelector('.authorRow');
            const authorSelectField = document.createElement('select');
            authorSelectField.setAttribute('id', 'author');
            authorSelectField.setAttribute('name', 'author');

            for (i = 0; i < authors.length; i++) {
                let authorSelect = document.createElement('option');
                authorSelect.textContent = authors[i].name;
                authorSelect.setAttribute('value', authors[i].id);
                authorSelectField.appendChild(authorSelect);
            }

            authorRow.appendChild(authorSelectField);


        })
        .fail((request, status, error) => {
            console.log(request);
        });
});