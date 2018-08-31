document.addEventListener('DOMContentLoaded', () => {

    const deleteButton = document.getElementById('deletebutton');

    deleteButton.addEventListener('click', (event) => {
            deleteBook(bookId);
    });
});