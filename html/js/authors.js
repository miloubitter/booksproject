document.addEventListener('DOMContentLoaded', () => {

    getAuthors()
        .done((data, text) => {

            let authors = JSON.parse(data);

            const authorInput = document.createElement('p');
            const authorSelectField = document.createElement('select');
            authorInput.setAttribute('id', 'author');
            authorInput.setAttribute('name', 'author');
            authorInput.appendChild(authorSelectField);


            for (i = 0; i < authors.length; i++) {
                let authorSelect = document.createElement('option');
                authorSelect.textContent = authors[i].name;
                authorSelect.setAttribute('value', authors[i].id);
                authorSelectField.appendChild(authorSelect);
            }
            authorDiv.appendChild(authorLabel);
            authorDiv.appendChild(authorInput);


        })
        .fail((request, status, error) => {
            console.log(request);
        });

    form.appendChild(authorDiv);
});