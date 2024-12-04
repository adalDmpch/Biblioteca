if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/serviceworker.js')
            .then(function(registration) {
                console.log('ServiceWorker registration successful');
            })
            .catch(function(error) {
                console.log('ServiceWorker registration failed: ', error);
            });
    });
}