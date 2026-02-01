<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>garage</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        :root {
            --primary-red: #9e0b0f;
            --dark-bg: #0f0f0f;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--dark-bg); color: var(--white); overflow-x: hidden; }

        /* NAVIGATION */
        nav {
            display: flex; justify-content: space-between; align-items: center;
            padding: 20px 5%; position: absolute; width: 100%; z-index: 100;
        }
        .logo { font-size: 22px; font-weight: 900; }
        .nav-links { display: flex; gap: 25px; list-style: none; }
        .nav-links a { color: white; text-decoration: none; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; opacity: 0.7; }

        /* HERO SECTION */
        .hero { display: flex; height: 100vh; width: 100%; position: relative; overflow: hidden; flex-wrap: wrap; }

        .hero-left {
            background-color: var(--primary-red);
            width: 48%; display: flex; flex-direction: column; justify-content: center;
            padding: 0 5%; clip-path: polygon(0 0, 100% 0, 85% 100%, 0% 100%);
            z-index: 2; transition: all 0.5s ease;
        }

        .hero-right {
            width: 60%; margin-left: -12%;
            background: #1a1a1a url('{{ asset('images/car4.jpg') }}') center center/cover;
            position: relative;
            ba
        }

        h1 { font-size: clamp(2.5rem, 5vw, 4.5rem); line-height: 0.95; text-transform: uppercase; margin-bottom: 20px; font-weight: 900; }
        .hero-text p { font-size: 1rem; margin-bottom: 30px; max-width: 400px; opacity: 0.8; }

        .btn-group { display: flex; gap: 15px; flex-wrap: wrap; }
        .btn {
            padding: 15px 30px; border: none; cursor: pointer; font-weight: 800;
            text-transform: uppercase; transition: 0.3s; font-size: 13px;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);
        }
        .btn-white { background: white; color: black; }
        .btn-outline { background: transparent; border: 1px solid white; color: white; }

        /* COLLECTION */
        .collection { padding: 60px 5%; background: #000; }
        .collection-header { 
            display: flex; justify-content: space-between; align-items: center; 
            margin-bottom: 30px; flex-wrap: wrap; gap: 20px;
        }
        
        .collection-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; }

        .car-container { 
            position: relative; overflow: hidden; transform: skewX(-10deg); 
            height: 220px; border: 1px solid #222; background: #111;
        }
        
        .car-container img {
            width: 150%; height: 100%; object-fit: cover;
            transform: skewX(10deg) translateX(-15%);
            transition: 0.6s; filter: brightness(0.6);
        }
        .car-container:hover img { filter: brightness(1); transform: skewX(10deg) translateX(-15%) scale(1.1); }

        /* --- RESPONSIVE --- */

        /* Tablettes (iPad, etc.) */
        @media (max-width: 1024px) {
            .hero-left { width: 55%; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%); }
            .collection-grid { grid-template-columns: repeat(2, 1fr); }
            h1 { font-size: 3.5rem; }
        }

        /* Mobiles (iPhone, Android) */
        @media (max-width: 768px) {
            nav { padding: 15px 5%; }
            .nav-links { display: none; } /* On cache les liens ou on met un menu burger */
            
            .hero { flex-direction: column; height: auto; }
            .hero-left { 
                width: 100%; height: 60vh; 
                clip-path: none; /* On retire le biais sur mobile pour plus d'espace */
                padding: 100px 5% 50px 5%;
            }
            .hero-right { width: 100%; height: 40vh; margin-left: 0; }
            
            h1 { font-size: 2.5rem; }
            .collection-grid { grid-template-columns: 1fr; } /* 1 seule colonne sur mobile */
            
            .car-container { transform: none; height: 200px; } /* On retire le skew sur mobile pour la clarté */
            .car-container img { transform: none; width: 100%; }
        }

        .reveal { opacity: 0; transform: translateY(30px); }
    </style>
</head>
<body>

    <nav>
        <div class="logo">KALIP'S</div>
        <ul class="nav-links">
          <div class="nav-links-small" style="display:flex; gap:15px; font-size:11px; opacity:0.6">
                <a href="{{ route('vehicules.index') }}" class="text-blue-600 underline">Gérer les Véhicules</a><br>
<a href="{{ route('techniciens.index') }}" class="text-black-600 ">Gérer les Techniciens</a><br>
<a href="{{ route('reparations.index') }}" class="text-black-600 ">Gérer les Réparations</a>
                <span>SPORT</span> <span>CITY</span> <span>ELECTRIC</span>
            </div>
        </ul>
        <div style="cursor:pointer">☰</div>
    </nav>

    <section class="hero">
        <div class="hero-left">
            <h1 class="reveal">HOUSE OF AUTOMOBILE</h1>
            <div class="hero-text">
                <p class="reveal">Une ère d'automobile qui revolutionne le monde, n'hesitez surtout pas à faire votre choix</p>
            </div>
            <div class="btn-group reveal">
                <button class="btn btn-white">Acheter maintenant</button>
                <button class="btn btn-outline">Learn More</button>
            </div>
        </div>
        <div class="hero-right" id="mainCar"></div>
    </section>

    <section class="collection">
        <div class="collection-header">
            <h2 style="letter-spacing: 2px;">NOS COLLECTIONS</h2>
           
        </div>

        <div class="collection-grid">
            <div class="car-container"><img src="{{ asset('images/car2.jpg') }}" alt="Car 2"></div>
            <div class="car-container"><img src="{{ asset('images/sportcar.jpg') }}" alt="Sport"></div>
            <div class="car-container"><img src="{{ asset('images/citycar.jpg') }}" alt="City"></div>
            <div class="car-container"><img src="{{ asset('images/electriccar.jpg') }}" alt="Electric"></div>
           <div class="car-container"><img src="{{ asset('images/car5.jpg') }}" alt="Car 5"></div>
            <div class="car-container"><img src="{{ asset('images/car6.jpg') }}" alt="Car 6"></div>
            <div class="car-container"><img src="{{ asset('images/car7.jpg') }}" alt="Car 7"></div>
            <div class="car-container"><img src="{{ asset('images/car8.jpg') }}" alt="Car 8"></
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tl = gsap.timeline({ defaults: { ease: "power3.out", duration: 1 } });

            tl.from(".hero-left", { xPercent: -100, duration: 1.2 })
              .to(".reveal", { opacity: 1, y: 0, stagger: 0.2 }, "-=0.5")
              .from(".car-container", { opacity: 0, y: 30, stagger: 0.1 }, "-=0.5");

            // Animation au scroll pour la collection (optionnel mais recommandé)
            gsap.from(".collection-header", {
                scrollTrigger: ".collection",
                opacity: 0,
                y: 20,
                duration: 1
            });
        });
    </script>
</body>
</html>