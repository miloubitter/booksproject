document.addEventListener('DOMContentLoaded', () => {

    const deleteButton = document.getElementById('deleteButton');

    deleteButton.addEventListener('submit', (event) => {
            deleteBook(bookId);
    });
});