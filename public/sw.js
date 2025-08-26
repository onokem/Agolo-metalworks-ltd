// Service Worker for Agolo Steelworks
// Provides offline functionality and asset caching

const CACHE_NAME = 'agolo-steelworks-v1.2';
const OFFLINE_URL = '/offline.html';

// Assets to cache immediately
const CRITICAL_ASSETS = [
    '/',
    '/services',
    '/portfolio', 
    '/about',
    '/contact',
    '/quote',
    '/offline.html',
    '/build/assets/app.css',
    '/build/assets/app.js',
    '/images/hero/workshop-hero.webp',
    '/images/hero/fabrication-hero.jpg',
    '/images/services/structural-welding.jpeg',
    '/images/services/metal-fabrication.jpeg',
    '/images/services/onsite-welding.jpeg',
    '/images/services/silo-welding.jpeg'
];

// Install event - cache critical assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Caching critical assets');
                return cache.addAll(CRITICAL_ASSETS);
            })
            .then(() => self.skipWaiting())
    );
});

// Activate event - clean old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys()
            .then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        if (cacheName !== CACHE_NAME) {
                            console.log('Deleting old cache:', cacheName);
                            return caches.delete(cacheName);
                        }
                    })
                );
            })
            .then(() => self.clients.claim())
    );
});

// Fetch event - serve from cache with network fallback
self.addEventListener('fetch', event => {
    // Skip cross-origin requests
    if (!event.request.url.startsWith(self.location.origin)) {
        return;
    }

    // Handle navigation requests
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request)
                .catch(() => {
                    return caches.open(CACHE_NAME)
                        .then(cache => {
                            return cache.match(OFFLINE_URL);
                        });
                })
        );
        return;
    }

    // Handle asset requests
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Return cached version if available
                if (response) {
                    return response;
                }

                // Otherwise fetch from network
                return fetch(event.request)
                    .then(response => {
                        // Don't cache non-successful responses
                        if (!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        // Cache images and assets
                        const responseToCache = response.clone();
                        const url = event.request.url;
                        
                        if (url.includes('/images/') || 
                            url.includes('/build/') ||
                            url.includes('.css') ||
                            url.includes('.js') ||
                            url.includes('.webp') ||
                            url.includes('.jpg') ||
                            url.includes('.jpeg') ||
                            url.includes('.png')) {
                            
                            caches.open(CACHE_NAME)
                                .then(cache => {
                                    cache.put(event.request, responseToCache);
                                });
                        }

                        return response;
                    });
            })
    );
});

// Background sync for form submissions
self.addEventListener('sync', event => {
    if (event.tag === 'quote-submission') {
        event.waitUntil(
            // Handle offline quote submissions
            handleOfflineQuoteSubmission()
        );
    }
});

async function handleOfflineQuoteSubmission() {
    // This would handle quote form submissions when back online
    console.log('Syncing offline quote submissions');
    
    // Get pending submissions from IndexedDB
    // Send them to server when connection is restored
    // This is a placeholder for the actual implementation
}
