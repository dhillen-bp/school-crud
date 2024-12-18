import "./bootstrap";
import 'flowbite';

import '../../vendor/masmerise/livewire-toaster/resources/js';

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});
