

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalNexus | Gestion Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
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
                <a href="/admin/dashboard" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-chart-pie text-lg"></i>
                    <span class="font-bold">Tableau de bord</span>
                </a>
                
                <a href="/admin/addProduct" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-box text-lg group-hover:text-blue-400"></i>
                    <span>Gestion Produits</span>
                </a>
                
                <a href="/admin/categories" class="flex items-center space-x-3 bg-blue-600 text-white p-4 rounded-2xl transition shadow-lg shadow-blue-900/20">
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

        <main class="flex-1">
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-40">
                <h2 class="text-xl font-extrabold text-slate-800">Gestion des Catégories</h2>
            </header>

            <div class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-6">Nouvelle Catégorie</h3>
                        <form action="/admin/categories" method="POST" class="space-y-4">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Nom de la catégorie</label>
                                <input type="text" name="nom_categorie" required placeholder="Ex: Electronique" 
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                            </div>
                            <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg shadow-slate-200">
                                <i class="fa-solid fa-plus mr-2"></i> Ajouter
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                        <div class="p-6 border-b border-slate-50">
                            <h3 class="text-lg font-bold text-slate-800">Catégories existantes</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50/50">
                                        <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">ID</th>
                                        <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Nom</th>
                                        <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    <?php if(!empty($categories)): ?>
                                        <?php foreach($categories as $cat): ?>
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-6 py-4 text-sm font-bold text-slate-400">#<?= $cat->id ?></td>
                                                <td class="px-6 py-4 text-sm font-extrabold text-slate-700"><?= htmlspecialchars($cat->nom) ?></td>
                                                <td class="px-6 py-4 text-right space-x-2">
                                                    <button class="text-blue-500 hover:bg-blue-50 p-2 rounded-lg transition"><i class="fa-solid fa-pen"></i></button>
                                                    <a class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="3" class="px-6 py-8 text-center text-slate-400">Aucune catégorie trouvée</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>