self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(["./styles/custom_style.css", "./styles/scripts.js", "./styles/charts.js"]);
        })
    );
});

self.addEventListener("fetch", e => {
    console.log(`Intercepting fetch request for: ${e.request.url}`);
});

self.addEventListener("fetch", e => {
    e.respondWith( 
        caches.match(e.request).then(response => {
            return response || fetch(e.request);
        })
    );
})