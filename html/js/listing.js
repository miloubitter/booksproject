$(document).ready(() => {

    const getBooksXml = () => {
        const request = new XMLHttpRequest();
        request.onreadystatechange = () => {
            if (request.readyState === 4) {
                if (request.status >= 200 && request.status < 300) {
                    let response = JSON.parse(request.response);
                    console.log(response);
                } else {
                    console.log(request);
                }
            }
        };
        request.open('GET',env.api + '?route=books');
        request.send();
    };

    const getBooksFetch = () => {
        fetch(env.api + '?route=books', {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
                //'X-XSRF-TOKEN': getCookieValue('XSRF-TOKEN')
            }
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    console.log(data);
                });
            }
            else {
                console.log(response);
            }
        });
    };

    getBooks()
        .done((data, text) => {

            let books = JSON.parse(data);
            const table = document.querySelector('.table');

            for(let i=0; i<books.length; i+=1){
                const row = document.createElement('tr');
                row.setAttribute('class','tablerow');

                row.onclick = () => {
                    window.location = '?route=show&id=' + books[i].id;
                };
                const imageCol = document.createElement('td');
                const imagePath = document.createElement('IMG');
                imagePath.setAttribute('src', 'images/' + books[i].image_filename);
                imagePath.setAttribute('class','imagesTable');
                imageCol.append(imagePath);

                const titleCol = document.createElement('td');
                titleCol.textContent = books[i].title;

                const authorCol = document.createElement('td');
                authorCol.textContent = books[i].author_name;
                authorCol.setAttribute('class','d-none d-sm-table-cell');

                const categoryCol = document.createElement('td');
                categoryCol.textContent = books[i].category_name;
                categoryCol.setAttribute('class','d-none d-sm-table-cell');

                const isbnCol = document.createElement('td');
                isbnCol.textContent = books[i].isbn;
                isbnCol.setAttribute('class','d-none d-sm-table-cell');

                const priceCol = document.createElement('td');
                priceCol.textContent ='€' + books[i].price;

                row.appendChild(imageCol);
                row.appendChild(titleCol);
                row.appendChild(authorCol);
                row.appendChild(categoryCol);
                row.appendChild(isbnCol);
                row.appendChild(priceCol);
                table.appendChild(row);
            }
         })
        .fail((request, status, error) =>
        {
            console.log(request);
        });
});
