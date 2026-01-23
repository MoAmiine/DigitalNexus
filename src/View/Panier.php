<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier | DigitalNexus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50">

    <nav class="h-20 bg-white border-b border-slate-100 flex items-center justify-between px-12 sticky top-0 z-50">
        <a href="/" class="text-2xl font-black tracking-tighter text-slate-900">DIGITAL<span class="text-blue-500">NEXUS</span></a>
        <a href="/" class="text-sm font-bold text-slate-500 hover:text-blue-600 transition">Continuer mes achats</a>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-black text-slate-900 mb-10 tracking-tight">Votre Panier</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-4">
                    <?php if (!empty($productsInCart)): ?>
                        <?php $total = 0; ?>
                        <?php foreach ($productsInCart as $p): ?>
                            <?php 
                                $qty = $_SESSION['panier'][$p->id]; 
                                $subtotal = $p->id * $qty;
                                $total += $subtotal;
                            ?>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 flex items-center shadow-sm hover:shadow-md transition">
                            <div class="w-24 h-24 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-200">
                                <i class="fa-solid fa-box text-2xl"></i>
                            </div>

                            <div class="flex-1 ml-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-extrabold text-slate-800 text-lg"><?= htmlspecialchars($p->nom) ?></h3>
                                        <p class="text-xs font-bold text-blue-500 uppercase tracking-widest mt-1">Ref: #00<?= $p->id ?></p>
                                    </div>
                                    <a href="/panier/deleteProduitFromPanier?id=<?= $p->id ?>" class="text-slate-300 hover:text-red-500 transition">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>

                                <div class="flex justify-between items-end mt-4">
                                    <div class="flex items-center bg-slate-50 rounded-xl p-1 border border-slate-100">
                                        <a href="/cart/decrease?id=<?= $p->id ?>" class="w-8 h-8 flex items-center justify-center hover:bg-white rounded-lg transition text-slate-500">-</a>
                                        <span class="px-4 font-bold text-slate-700"><?= $qty ?></span>
                                        <a href="/cart/increase?id=<?= $p->id ?>" class="w-8 h-8 flex items-center justify-center hover:bg-white rounded-lg transition text-slate-500">+</a>
                                    </div>
                                    <p class="font-black text-slate-900 text-xl"><?= number_format($subtotal, 2) ?> DH</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="bg-white p-12 rounded-[3rem] text-center border-2 border-dashed border-slate-200">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                            <i class="fa-solid fa-cart-shopping text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-black text-slate-800">Votre panier est vide</h2>
                        <p class="text-slate-500 mt-2 mb-8">Il semblerait que vous n'ayez pas encore fait votre choix.</p>
                        <a href="/" class="inline-block bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-slate-900 transition shadow-xl shadow-blue-200">Parcourir les produits</a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($productsInCart)): ?>
            <div class="lg:col-span-1">
                <div class="bg-slate-900 text-white p-8 rounded-[2.5rem] sticky top-32 shadow-2xl shadow-slate-200">
                    <h2 class="text-xl font-bold mb-8">Résumé</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-slate-400 font-medium">
                            <span>Sous-total</span>
                            <span class="text-white"><?= number_format($total, 2) ?> DH</span>
                        </div>
                        <div class="flex justify-between text-slate-400 font-medium">
                            <span>Livraison</span>
                            <span class="text-emerald-400">Gratuite</span>
                        </div>
                    </div>

                    <div class="border-t border-slate-800 pt-6 mb-10">
                        <div class="flex justify-between items-end">
                            <span class="text-slate-400 font-bold uppercase text-xs tracking-widest">Total TTC</span>
                            <span class="text-3xl font-black"><?= number_format($total, 2) ?> DH</span>
                        </div>
                    </div>

                    <button class="w-full bg-blue-600 py-5 rounded-2xl font-extrabold hover:bg-white hover:text-slate-900 transition duration-300 shadow-lg shadow-blue-500/20">
                        Commander maintenant
                    </button>
                    
                    <p class="text-[10px] text-center text-slate-500 mt-6 uppercase tracking-widest font-bold">Paiement sécurisé garanti</p>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </main>
</body>
</html>