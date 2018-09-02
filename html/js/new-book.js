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
                image_filename: form.image_filename.value,
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

    for(let i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener('blur', fieldValidation);
    }
});