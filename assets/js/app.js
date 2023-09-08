import '../css/app.scss';
import { Controller } from '@hotwired/stimulus';

require('bootstrap');
import 'bootstrap'
import {dropdown} from "bootstrap/js/src/dropdown";

document.addEventListener("DOMContentLoaded", () => {
    enableDropdowns()
} )
const enableDropdowns = ()=> {
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new Dropdown(dropdownToggleEl))
}