document.addEventListener('DOMContentLoaded', () => {

    const deleteButton = document.getElementById('deleteButton');

    deleteButton.addEventListener('click', (event) => {
        confirmDelete = confirm('Are you sure you want to delete this book?');
        if (confirmDelete === true) {
            deleteBook(bookId);
            window.location = '?route=allbooks';
        }
    });
});