<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalNexus | Gestion Utilisateurs</title>
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
                
                <a href="/admin/categories" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 hover:text-white p-4 rounded-2xl transition group">
                    <i class="fa-solid fa-layer-group text-lg group-hover:text-blue-400"></i>
                    <span>Catégories</span>
                </a>
                
                <a href="/admin/users" class="flex items-center space-x-3 bg-blue-600 text-white p-4 rounded-2xl transition shadow-lg shadow-blue-900/20">
                    <i class="fa-solid fa-users-gear text-lg"></i>
                    <span class="font-bold">Utilisateurs</span>
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
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800">Gestion des Utilisateurs</h2>
                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Liste des membres inscrits</p>
                </div>
            </header>

            <div class="p-8">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest">Utilisateur</th>
                                    <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-widest">Rôle</th>
                                    <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-widest">Statut</th>
                                    <th class="px-8 py-5 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <?php if(!empty($users)): ?>
                                    <?php foreach($users as $user): ?>
                                        <tr class="hover:bg-slate-50/80 transition group">
                                            <td class="px-8 py-5">
                                                <div class="flex items-center space-x-4">
                                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                                                        <?= strtoupper(substr($user->username, 0, 2)) ?>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-extrabold text-slate-700"><?= htmlspecialchars($user->username) ?></p>
                                                        <p class="text-xs text-slate-400 font-medium"><?= htmlspecialchars($user->email) ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider <?= $user->role === 'admin' ? 'bg-purple-100 text-purple-600' : 'bg-slate-100 text-slate-600' ?>">
                                                    <?= $user->role ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="flex items-center text-xs font-bold text-emerald-500">
                                                    <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span> Actif
                                                </div>
                                            </td>
                                            <td class="px-8 py-5 text-right">
                                                <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition">
                                                    <button class="p-2 text-slate-400 hover:text-blue-500 transition"><i class="fa-solid fa-pen-to-square"></i></button>
                                                    <a href="/admin/users/delete?id=<?= $user->id ?>" class="p-2 text-slate-400 hover:text-red-500 transition" onclick="return confirm('Bannir cet utilisateur ?')">
                                                        <i class="fa-solid fa-user-minus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="px-8 py-12 text-center text-slate-400 font-bold">Aucun utilisateur trouvé</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>