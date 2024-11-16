var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/css/home.css',
    '/css/login.css',
    '/js/app.js',
    '/images/icons/Jaydey-72X72.png',
    '/images/icons/Jaydey-96X96.png',
    '/images/icons/Jaydey-128X128.png',
    '/images/icons/Jaydey144X144.png',
    '/images/icons/Jaydey-152X152.png',
    '/images/icons/Jaydey-192X192.png',
    '/images/icons/Jaydey-384X384.png',
    '/images/icons/Jaydey-512X512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});