<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalNexus | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

    <div class="min-h-screen flex">
        <aside class="w-72 bg-slate-900 text-white hidden lg:flex flex-col sticky top-0 h-screen">
            <div class="p-8">
                <a href="/" class="text-2xl font-black tracking-tighter">
                    DIGITAL<span class="text-blue-500">NEXUS</span>
                </a>
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-[0.2em] mt-1">Administration Panel</p>
            </div>
            
            <nav class="flex-1 px-6 space-y-2">
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mb-4 ml-2">Menu Principal</p>
                
                <a href="/admin/dashboard" class="flex items-center space-x-3 bg-blue-600 text-white p-4 rounded-2xl transition shadow-lg shadow-blue-900/20">
                    <i class="fa-solid fa-chart-pie text-lg"></i>
                    <span class="font-bold">Tableau de bord</span>
                </a>
                
                <a href="/admin/addProduct" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-box text-lg group-hover:text-blue-400"></i>
                    <span>Gestion Produits</span>
                </a>
                
                <a href="/admin/categories" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-layer-group text-lg group-hover:text-blue-400"></i>
                    <span>Catégories</span>
                </a>
                
                <a href="/admin/users" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-users-gear text-lg group-hover:text-blue-400"></i>
                    <span>Utilisateurs</span>
                </a>
            </nav>

            <div class="p-6 border-t border-slate-800">
                <a href="/logout" class="flex items-center space-x-3 text-red-400 hover:bg-red-500/10 p-4 rounded-2xl transition font-bold">
                    <i class="fa-solid fa-power-off"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-40">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800">Vue d'ensemble</h2>
                    <p class="text-xs text-slate-400 font-medium">Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom'] ?? 'Administrateur') ?></p>
                </div>
                
                <div class="flex items-center space-x-6">
                    <button class="relative p-2 text-slate-400 hover:text-blue-600 transition">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    
                    <div class="h-10 w-[1px] bg-slate-200"></div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-slate-800"><?= htmlspecialchars($_SESSION['user']['Firstname'] ?? 'Admin') ?></p>
                            <p class="text-[10px] font-bold text-blue-600 uppercase">Super Admin</p>
                        </div>
                        <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center text-white font-black text-lg border-4 border-slate-50">
                            <?= substr($_SESSION['user']['Firstname'] ?? 'A', 0, 1) ?>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:shadow-xl transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Produits</p>
                                <h3 class="text-3xl font-black text-slate-900 mt-2"><?= $totalProduits ?></h3>
                                <p class="text-emerald-500 text-xs font-bold mt-2"><i class="fa-solid fa-arrow-up"></i> +12% ce mois</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-box-open text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:shadow-xl transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Ventes</p>
                                <h3 class="text-3xl font-black text-slate-900 mt-2">0,00€</h3>
                                <p class="text-emerald-500 text-xs font-bold mt-2"><i class="fa-solid fa-arrow-up"></i> +0.0%</p>
                            </div>
                            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-wallet text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:shadow-xl transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Commandes</p>
                                <h3 class="text-3xl font-black text-slate-900 mt-2">0</h3>
                                <p class="text-blue-500 text-xs font-bold mt-2">En cours de traitement</p>
                            </div>
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-truck-fast text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 group hover:shadow-xl transition-all">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Utilisateurs</p>
                                <h3 class="text-3xl font-black text-slate-900 mt-2"><?= $totalUsers ?></h3>
                                <p class="text-slate-400 text-xs font-bold mt-2">Inscriptions actives</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                                <i class="fa-solid fa-users text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-900">Derniers Produits</h3>
                            <p class="text-sm text-slate-400">Gérez votre inventaire en temps réel.</p>
                        </div>
                        <a href="/admin/addProduct" class="bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-blue-600 transition-all shadow-lg flex items-center justify-center">
                            <i class="fa-solid fa-plus mr-2"></i> Ajouter un produit
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50">
                                <tr class="text-[10px] uppercase tracking-[0.15em] text-slate-400 font-black">
                                    <th class="px-8 py-5">Produit</th>
                                    <th class="px-8 py-5">Catégorie</th>
                                    <th class="px-8 py-5">Prix</th>
                                    <th class="px-8 py-5">Statut</th>
                                    <th class="px-8 py-5 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php if (!empty($produits)): ?>
                                    <?php foreach($produits as $p): ?>
                                    <tr class="group hover:bg-slate-50/80 transition-all">
                                        <td class="px-8 py-5">
                                            <div class="flex items-center space-x-4">

                                                <span class="font-bold text-slate-700"><?= htmlspecialchars($p->getNom()) ?></span>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black rounded-full uppercase">
                                                <?= htmlspecialchars($p->getCategorie()) ?>
                                            </span>
                                        </td>
                                        <td class="px-8 py-5 font-black text-slate-900"><?= number_format($p->getPrix(), 2) ?> €</td>
                                        <td class="px-8 py-5">
                                            <div class="flex items-center text-emerald-500 text-xs font-bold">
                                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span> En stock
                                            </div>
                                        </td>
                                        <td class="px-8 py-5 text-right">
                                            <div class="flex justify-end space-x-2">
                                                <button title="Modifier" class="w-9 h-9 flex items-center justify-center bg-slate-100 text-slate-600 rounded-xl hover:bg-blue-600 hover:text-white transition">
                                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                                </button>
                                                <a href="/admin/DeleteProduct?id=<?= $p->getId()?>"><button title="Supprimer" class="w-9 h-9 flex items-center justify-center bg-slate-100 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition">
                                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                                </button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="px-8 py-20 text-center text-slate-400 font-medium">
                                            <i class="fa-solid fa-inbox text-4xl mb-4 block"></i>
                                            Aucun produit trouvé dans l'inventaire.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-6 bg-slate-50/50 border-t border-slate-100 text-center">
                        <a href="/admin/produits" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">Voir tous les produits <i class="fa-solid fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>