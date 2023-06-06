import Swal from 'sweetalert2';
window.Swal = Swal;

// toast with default settings and event listener
window.addEventListener('swal:toast', event => {
    // default settings for toasts
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        background: 'white',
        color: 'white',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    // convert some attributes
    const Config = convertAttributes(event.detail);
    // override default settings or add new settings
    Toast.fire(Config);
});

function convertAttributes(attributes) {
    // convert predefined 'words' to a real color
    switch (attributes.background) {
        case 'danger':
        case 'error':
            attributes.background = 'rgb(204, 0, 0)';
            break;
        case 'warning':
            attributes.background = 'rgb(255, 237, 213)';
            break;
        case 'primary':
        case 'info':
            attributes.background = 'rgb(207, 250, 254)';
            break;
        case 'success':
            attributes.background = 'rgb(76, 153, 0)';
            break;
    }
    // if the attribute 'text' is set, convert it to the attribute 'html'
    if (attributes.text) {
        attributes.html = attributes.text;
        delete attributes.text;
    }
    return attributes;

}

window.addEventListener('swal:confirm', event => {
    // default settings for confirm modals
    const Confirm = Swal.mixin({
        width: 600,
        position: 'center',
        backdrop: true,
        showCancelButton: true,
        cancelButtonText: 'Annuleren',
        cancelButtonColor: 'rgb(204, 0, 0)',
        showConfirmButton: true,
        confirmButtonText: 'Yes',
        confirmButtonColor: 'rgb(51, 153, 255)',
        reverseButtons: true,
        allowEscapeKey: true,
        allowOutsideClick: true,
    });
    // move the 'next' property to the 'nextEvent' variable and delete it from the 'event.detail' object
    const NextEvent = event.detail.next ;
    delete event.detail.next;
    // convert some attributes
    const Config = convertAttributes(event.detail);
    // override default settings or add new settings
    Confirm.fire(Config)
        .then(result => {
            // execute this function if the confirm button is clicked AND if a 'NextEvent' is not empty
            if (result.isConfirmed && NextEvent) {
                // dispatch a Livewire event with 'event' as the event name and 'params' as the payload
                window.Livewire.emit(NextEvent.event, NextEvent.params);
                // dispatch a browser event with 'closeModal' as the event name and 'params' as the payload
                window.dispatchEvent(new CustomEvent(NextEvent.event, NextEvent.params));
            }
        });
});