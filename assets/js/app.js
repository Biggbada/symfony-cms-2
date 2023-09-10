import '../css/app.scss';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
const bootstrap = require('bootstrap');

document.addEventListener('DOMContentLoaded', ()=> {
    new App();
})
class App {
    constructor() {
        this.handleCommentForm();
    }

    handleCommentForm() {
        const commentForm = document.querySelector('form.comment-form');
        console.log(commentForm);
        if(null== commentForm) {
            return;
        }
        commentForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const response = await fetch('/ajax/comments', {
                method: 'Post',
                body: new FormData(e.target)
            });

            if(!response.ok) {
                return;
            }
            const json = await response.json();
            console.log(json);
        })

    }
}

