import "./bootstrap";
import 'flowbite';
import { initFlowbite } from 'flowbite';

import jQuery from 'jquery';
window.$ = jQuery;
import {DataTable} from "simple-datatables"

import '../../vendor/masmerise/livewire-toaster/resources/js';

document.addEventListener('livewire:navigated', () => {
    // Reinitialize Flowbite components
    initFlowbite();
});

// const dataTable = new DataTable("#classTable", {
//     searchable: true,
//     sortable: true,
//     paging: true,
//     perPage: 5,
//     perPageSelect: [5, 10, 15, 20, 25],
// });

