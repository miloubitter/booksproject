$(document).ready(() => {

    getOneBook(bookId)
        .done((data, text) => {

            let details = JSON.parse(data);

            const titleText = document.querySelector('.titleText');
            const authorText = document.querySelector('.authorText');
            const categoryText = document.querySelector('.categoryText');
            const isbnText = document.querySelector('.isbnText');
            const priceText = document.querySelector('.priceText');
            const descriptionText = document.querySelector('.descriptionText');

            const titleH1 = document.createElement('h1');
            titleH1.textContent = details.title;

            const authorP = document.createElement('p');
            authorP.textContent = details.author_name;

            const categoryP = document.createElement('p');
            categoryP.textContent = details.category_name;

            const isbnP = document.createElement('p');
            isbnP.textContent = details.isbn;

            const priceP = document.createElement('p');
            priceP.textContent = '€ ' + details.price;

            const descriptionP = document.createElement('p');
            descriptionP.textContent = details.description;

            titleText.appendChild(titleH1);
            authorText.appendChild(authorP);
            categoryText.appendChild(categoryP);
            isbnText.appendChild(isbnP);
            priceText.appendChild(priceP);
            descriptionText.appendChild(descriptionP);
        })
            .fail((request, status, error) =>
        {
            console.log(request);
        });
});