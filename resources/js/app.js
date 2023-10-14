import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';

window.$ = window.jQuery = jQuery; // Inicializa jQuery globalmente

// Asegúrate de que el código jQuery se ejecute después de que la página esté completamente cargada

