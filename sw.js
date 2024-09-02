
var CACHE_STATIC_NAME = 'static-v4';
var CACHE_DYNAMIC_NAME = 'dynamic-v2';

self.addEventListener('install', function(event) {
  console.log('[Service Worker] Installing Service Worker ...', event);
  event.waitUntil(
    caches.open(CACHE_STATIC_NAME)
      .then(function(cache) {
        console.log('[Service Worker] Precaching App Shell');
        cache.addAll([
          '/',
          '/index.php',
          '/src/js/app.js',
          '/src/js/feed.js',
          '/src/js/promise.js',
          '/src/js/fetch.js',
          '/src/js/material.min.js',
          '/js/app.css', 
          '/js/bootstrap.min.js',
          '/js/bootstrap.min.js.map',
          '/js/isotope.pkgd.min.js',
          '/js/jquery-3.5.1.min.js',
          '/js/jquery.ajaxchimp.min.js',
          '/js/jquery.counterup.min.js',
          '/js/jquery.vide.js',
          '/js/lightbox.min.js',
          '/js/lightbox.min.map',
          '/js/owl.carousel.min.js',
          '/js/particles.min.js',
          '/js/popper.min.js',
          '/js/validator.min.js',
          '/js/waypoint.js',
          '/js/main.js',
            
          '/css/bootstrap.min.css',
          '/css/bootstrap.min.css.map',
          '/css/lightbox.min.css',
          '/css/owl.carousel.min.css',
          '/css/owl.theme.default.min.css',
          '/css/parallax.css',
          '/css/responsive.css',
          '/css/style.css',
          '/css/fontawesome/all.min.css',
          '/images/background/computer clouds Jhon Gil.avif',
          '/images/blog/thumb/CloudLayoutArzuGil.avif',
          '/images/blog/thumb/CertificationLayoutArzugilpng.avif',
          '/images/Certifications/DeveloperApprenticeship.avif',
          '/images/Certifications/EnterpriseDesign.avif',
          '/images/Certifications/IBAgile.avif',
          '/images/Certifications/IBM Cloud Cert.avif',
          '/images/Certifications/IBMAICertJhons.avif',
          '/images/Certifications/JhonsAnalyticsCloud.avif',
          '/images/Certifications/JhonsComptiaA+.avif',
          '/images/Certifications/SecurityPrivacy.avif',
          '/images/Certifications/JhonArzuGilAzure900.avif',
          '/images/Certifications/IBMstoragecert.avif',
            
          '/images/customer/Baton Rouge Driving Service - Google.avif',
          '/images/customer/Lakeodessacarpetcare.avif',
          '/logo.avif',
            
          '/portfolio/Project1Arzugil.avif',
          '/portfolio/Project2CloudtechnologCcomputing.avif',
          '/portfolio/Project3Iownya.avif',
          '/portfolio/Project4IownyaApp.avif',
          '/portfolio/Project5MemoirApppngDisplay.avif',
          '/portfolio/Project6BeachApp.avif', 
            
          '/thumb/Project1ArzugilDisplay.avif',
          '/thumb/Project2CloudtechnologCcomputingDisplay.avif',
          '/thumb/Project3IownyaDisplay.avif',
          '/thumb/Project4IownyaAppDisplay.avif',
          '/thumb/Project1ArzugilDisplay.avif',
          '/thumb/Project1ArzugilDisplay.avif',
            
          '/profile/Jhon Arzu-Gil Profile IMG.avif',
          '/profile/CloudTechnology Computing.avif',
          '/profile/computer clouds Jhon Gil.avif',
          '/hackerJhon.png',
          
            
          'https://fonts.googleapis.com/css?family=Roboto:400,700',
          'https://fonts.googleapis.com/icon?family=Material+Icons',
          'https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.indigo-pink.min.css'
        ]);
      })
  )
});

self.addEventListener('activate', function(event) {
  console.log('[Service Worker] Activating Service Worker ....', event);
  event.waitUntil(
    caches.keys()
      .then(function(keyList) {
        return Promise.all(keyList.map(function(key) {
          if (key !== CACHE_STATIC_NAME && key !== CACHE_DYNAMIC_NAME) {
            console.log('[Service Worker] Removing old cache.', key);
            return caches.delete(key);
          }
        }));
      })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        if (response) {
          return response;
        } else {
          return fetch(event.request)
            .then(function(res) {
              return caches.open(CACHE_DYNAMIC_NAME)
                .then(function(cache) {
                  cache.put(event.request.url, res.clone());
                  return res;
                })
            })
            .catch(function(err) {

            });
        }
      })
  );
});