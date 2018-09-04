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
                author_id: form.author.value,
                category_id: form.category.value,
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

    getAuthors()
        .done((data, text) => {

            let authors = JSON.parse(data);
            const authorRow = document.querySelector('.authorRow');
            const authorSelectField = document.createElement('select');
            authorSelectField.setAttribute('id', 'author');
            authorSelectField.setAttribute('name', 'author');
            authorSelectField.setAttribute('class', 'updateTextField');

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

    getCategories()
        .done((data, text) => {

            let categories = JSON.parse(data);
            const categoryRow = document.querySelector('.categoryRow');
            const categorySelectField = document.createElement('select');
            categorySelectField.setAttribute('id', 'category');
            categorySelectField.setAttribute('name', 'category');
            categorySelectField.setAttribute('class', 'updateTextField');

            for (i = 0; i < categories.length; i++) {
                let categorySelect = document.createElement('option');
                categorySelect.textContent = categories[i].name;
                categorySelect.setAttribute('value', categories[i].id);
                categorySelectField.appendChild(categorySelect);
            }

            categoryRow.appendChild(categorySelectField);


        })
        .fail((request, status, error) => {
            console.log(request);
        });
});