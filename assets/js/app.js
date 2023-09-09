import '../css/app.scss';
import { Controller } from '@hotwired/stimulus';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
const bootstrap = require('bootstrap');
const { Dropzone } = require("dropzone");


