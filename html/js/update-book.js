document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('updateBookForm');
    const inputTitle = document.getElementById('title');
    const inputFields = form.querySelectorAll('input, textarea');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        for (let i = 0; i < inputFields.length; i++) {

            if (!inputFields[i].checkValidity()) {
                addErrorMessageForElement(inputFields[i]);
            } else {
                clearErrorMessageForElement(inputFields[i])
            }
        }

        if (form.checkValidity()) {

            const book = {
                title: form.title.value,
                author_id: form.author_id.value,
                category_id: form.category_id.value,
                isbn: form.isbn.value,
                price: form.price.value,
                description: form.description.value
            };

            updateBook(bookId,book)
                .done((data, text) => {
                    form.reset();

                    //appendSuccesMessage('Book successfully updated!','.message-container');
                    window.location.replace("?route=show&id=" + JSON.parse(bookId));
                })
                .fail((request, status, error) => {

                    console.log(request)
                });
        }
    });

    //"Location: ?route=show&id=" + book.id;

    inputTitle.addEventListener('blur', (event) => {
        if (event.target.value.length < 6 && event.target.value.length > 0) {
            event.target.setCustomValidity('Titel moet meer dan 4 karakters bevatten')

        } else {
            event.target.setCustomValidity('');
        }

    });

    for (let i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener('blur', fieldValidation);
    }
});