import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// Initialization for ES Users
import {
    Carousel,
    Dropdown,
    Ripple,
    Input,
    Select,
    initTE,
} from "tw-elements";

initTE({ Carousel, Dropdown, Ripple, Input, Select });

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
