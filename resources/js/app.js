import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// Initialization for ES Users
import {
    Carousel,
    initTE,
} from "tw-elements";

initTE({ Carousel });

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
