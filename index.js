if("serviceWorker" in navigator) {
    navigator.serviceWorker.register("service_worker.js").then(registration=> {
        console.log("Service Worker Registered!");
        console.log(registration);
    }).catch(error => {
        console.log("Service Worker Registration Failed!");
        console.log(error);
    });
}