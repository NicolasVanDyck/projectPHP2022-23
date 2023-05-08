import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// Initialization for ES Users
import {
    Carousel,
    Collapse,
    Dropdown,
    Ripple,
    Input,
    Select,
    Chart,
    initTE,
} from "tw-elements";

initTE({ Carousel, Collapse, Dropdown, Ripple, Input, Select, Chart });

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
