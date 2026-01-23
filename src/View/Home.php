<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalNexus | Excellence Électronique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .tech-bg {
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-extrabold tracking-tighter text-slate-900">
                DIGITAL<span class="text-blue-600">NEXUS</span>
            </a>

            <div class="hidden md:flex items-center space-x-8 font-semibold text-sm">

                <a href="#catalogue" class="hover:text-blue-600 transition">Catalogue</a>
                <?php if (isset($_SESSION['panier'])):?>
                <a href="panier/showPanierProduct" class="hover:text-blue-600 transition">Panier (<?= App\Controller\PanierController::getCartCount(); ?>)</a>
                    <?php endif?>
                <?php if (isset($_SESSION['user'])): ?>
                    <?php
                    if ($_SESSION['user']['role'] == 'admin') : ?>
                        <a href="/admin/Dashboard" class="hover:text-blue-600 transition">Dashboard</a>
                    <?php endif; ?>
                    <div class="flex items-center space-x-4">
                        <span class="text-slate-900">
                            <i class="fa-regular fa-user mr-2 text-blue-600"></i>
                            <?= htmlspecialchars($_SESSION['user']['Firstname']) ?>
                        </span>
                        <a href="../../../../auth/Logout" class="bg-slate-100 text-slate-900 px-6 py-2.5 rounded-full hover:bg-red-50 hover:text-red-600 transition border border-slate-200">
                            Déconnexion
                        </a>
                    </div>
                <?php else: ?>
                    <a href="../../../../auth/Login" class="text-slate-500 hover:text-slate-900 transition">Connexion</a>
                    <a href="../../../../auth/SignUp" class="bg-slate-900 text-white px-6 py-2.5 rounded-full hover:bg-blue-600 transition shadow-lg shadow-blue-200">
                        S'inscrire
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="tech-bg py-20 px-6">
        <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="text-white space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest">
                    Nouveautés 2026
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    <?php if (isset($_SESSION['user'])): ?>
                        Ravi de vous voir, <span class="text-blue-500"><?= htmlspecialchars($_SESSION['user']['Firstname']) ?></span>.
                    <?php else: ?>
                        Le futur de la <span class="text-blue-500">Tech</span> est ici.
                    <?php endif; ?>
                </h1>
                <p class="text-slate-400 text-lg max-w-md">
                    Explorez notre sélection de composants et périphériques haut de gamme pour booster vos performances.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#catalogue" class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-xl font-bold transition flex items-center group">
                        Découvrir le catalogue
                        <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </a>
                </div>
            </div>

            <div class="hidden md:block relative">
                <div class="absolute -inset-4 bg-blue-500/20 blur-3xl rounded-full"></div>
                <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&q=80&w=800"
                    class="relative rounded-2xl shadow-2xl border border-white/10" alt="Tech Gear">
            </div>
        </div>
    </header>

    <section class="container mx-auto px-6 -mt-10 grid md:grid-cols-3 gap-6 relative z-10">
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-slate-100 flex items-center space-x-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                <i class="fa-solid fa-bolt-lightning text-xl"></i>
            </div>
            <div>
                <h3 class="font-bold text-slate-900">Livraison Prioritaire</h3>
                <p class="text-xs text-slate-500">Expédié sous 24h ouvrées</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-slate-100 flex items-center space-x-4">
            <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                <i class="fa-solid fa-lock text-xl"></i>
            </div>
            <div>
                <h3 class="font-bold text-slate-900">Paiement Sécurisé</h3>
                <p class="text-xs text-slate-500">Cryptage SSL 256-bits</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-slate-100 flex items-center space-x-4">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                <i class="fa-solid fa-arrows-rotate text-xl"></i>
            </div>
            <div>
                <h3 class="font-bold text-slate-900">Retours Gratuits</h3>
                <p class="text-xs text-slate-500">Satisfait ou remboursé 30j</p>
            </div>
        </div>
    </section>

    <main id="catalogue" class="pt-24 pb-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="mb-12">
                <h2 class="text-3xl font-black text-slate-900">Catalogue <span class="text-blue-600">Digital</span></h2>
                <p class="text-slate-500">Les meilleurs composants au meilleur prix.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <?php foreach ($produits as $produit): ?>
                    <div class="group bg-white rounded-[2rem] border border-slate-100 p-5 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2">
                        <div class="relative h-48 w-full bg-slate-50 rounded-[1.5rem] mb-5 overflow-hidden flex items-center justify-center">
                            <i class="fa-solid fa-box text-4xl text-slate-200 group-hover:scale-110 transition-transform duration-500"></i>

                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest text-blue-600 shadow-sm">
                                <?= htmlspecialchars($produit->categorie_nom ?? 'Tech') ?>
                            </span>
                        </div>

                        <div class="px-2">
                            <h3 class="text-lg font-extrabold text-slate-800 leading-tight mb-2 group-hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($produit->getNom()) ?>
                            </h3>

                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Prix</p>
                                    <p class="text-xl font-black text-slate-900">
                                        <?= number_format($produit->getPrix(), 2) ?> <span class="text-blue-500 text-sm">DH</span>
                                    </p>
                                </div>
                                <a href="/panier/addProduitToPanier?id=<?= $produit->getId() ?>"
                                    class="w-12 h-12 bg-slate-900 text-white rounded-2xl inline-flex items-center justify-center hover:bg-blue-600 transition-all shadow-lg shadow-slate-200 active:scale-90">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
    <footer class="bg-white border-t border-slate-100 py-12 mt-20">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-12 text-sm">
            <div class="col-span-2">
                <a href="#" class="text-xl font-extrabold tracking-tighter text-slate-900">
                    DIGITAL<span class="text-blue-600">NEXUS</span>
                </a>
                <p class="mt-4 text-slate-500 max-w-xs leading-relaxed">
                    Le partenaire de confiance pour tous vos besoins en électronique de pointe. Qualité certifiée et service client premium.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-xs tracking-widest text-slate-400">Liens Rapides</h4>
                <ul class="space-y-2 text-slate-600">
                    <li><a href="#" class="hover:text-blue-600">À propos</a></li>
                    <li><a href="#" class="hover:text-blue-600">CGV</a></li>
                    <li><a href="#" class="hover:text-blue-600">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-xs tracking-widest text-slate-400">Newsletter</h4>
                <div class="flex">
                    <input type="text" placeholder="Votre email" class="bg-slate-50 border border-slate-200 rounded-l-lg px-4 py-2 w-full focus:outline-none focus:ring-1 focus:ring-blue-600">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">OK</button>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6 mt-12 pt-8 border-t border-slate-50 text-center text-xs text-slate-400">
            &copy; 2026 DigitalNexus. Projet Académique MVC.
        </div>
    </footer>

</body>

</html>