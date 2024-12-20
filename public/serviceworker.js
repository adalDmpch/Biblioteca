var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/public/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(staticCacheName).then(function(cache) {
            return Promise.all(
                filesToCache.map(function(url) {
                    return cache.add(url).catch(function(error) {
                        console.log('Failed to cache:', url, error);
                        // Continúa aunque falle un archivo
                        return Promise.resolve();
                    });
                })
            );
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        // Intenta obtener el recurso de la red primero
        fetch(event.request).catch(function() {
            return caches.match(event.request).then(function(response) {
                if (response) {
                    return response;
                }
                if (event.request.mode === 'navigate') {
                    return caches.match('/offline');
                }
                return new Response('', {
                    status: 404,
                    statusText: 'Not found'
                });
            });
        })
    );
});


self.addEventListener('activate', function(event) {
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.filter(function(cacheName) {
                    return cacheName.startsWith('pwa-') && cacheName !== staticCacheName;
                }).map(function(cacheName) {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});