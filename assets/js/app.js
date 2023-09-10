import '../css/app.scss';
import {Dropdown} from "bootstrap";

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
const bootstrap = require('bootstrap');
console.log('coucou');

document.addEventListener('DOMContentLoaded', ()=> {
    console.log('dom chargé');
    new App();
})
class App {
    constructor() {
        this.enableDropdowns();
        this.handleCommentForm();
    }

    enableDropdowns() {
        const dropDownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        dropDownElementList.map(function (dropdownToggleEl) {
            return new Dropdown(dropdownToggleEl)
        })
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

