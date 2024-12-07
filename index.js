const APP = {
    deferredInstall: null,

    init() {
        // Register Service Worker
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker
                .register("service_worker.js")
                .then(registration => {
                    console.log("Service Worker Registered!");
                    console.log(registration);
                })
                .catch(error => {
                    console.log("Service Worker Registration Failed!");
                    console.error(error);
                });
        }

        // Handle beforeinstallprompt event
        window.addEventListener("beforeinstallprompt", (ev) => {
            ev.preventDefault();
            APP.deferredInstall = ev;
            console.log("Install prompt event stored.");

            // Show the install button (if hidden)
            const installBtn = document.getElementById("installBtn");
            if (installBtn) {
                installBtn.style.display = "block"; // Make the button visible
            }
        });

        // Add listener to the install button
        const installBtn = document.getElementById("installBtn");
        installBtn?.addEventListener("click", APP.startInstall);
    },

    startInstall() {
        if (APP.deferredInstall) {
            // Show the install prompt
            APP.deferredInstall.prompt();
            APP.deferredInstall.userChoice.then(choice => {
                if (choice.outcome === "accepted") {
                    console.log("User accepted the install prompt.");
                } else {
                    console.log("User dismissed the install prompt.");
                }
                APP.deferredInstall = null; // Reset the deferred install event
            });
        }
    }
};

// Initialize when DOM content is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    APP.init();
});
