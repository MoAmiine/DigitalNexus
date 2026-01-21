<?php 
use App\Model\Categorie;
use App\Controller\AdminController;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalNexus | Nouveau Produit</title>
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
                <a href="/" class="text-2xl font-black tracking-tighter uppercase">
                    Digital<span class="text-blue-500">Nexus</span>
                </a>
            </div>
            <nav class="flex-1 px-6 space-y-2">
                <a href="/admin/dashboard" class="flex items-center space-x-3 text-slate-400 hover:bg-slate-800 p-4 rounded-2xl transition">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/admin/produits" class="flex items-center space-x-3 bg-blue-600 text-white p-4 rounded-2xl shadow-lg shadow-blue-900/20 transition">
                    <i class="fa-solid fa-box"></i>
                    <span class="font-bold">Gestion Produits</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-40">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800">Ajouter un produit</h2>
                    <p class="text-xs text-slate-400 font-medium">Gestion de l'inventaire DigitalNexus</p>
                </div>
                <a href="/admin/produits" class="text-sm font-bold text-slate-500 hover:text-blue-600 transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour à la liste
                </a>
            </header>

            <div class="p-8 max-w-3xl mx-auto">
                <form action="/admin/addProduct" method="POST" class="space-y-6">
                    
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 space-y-6">
                        
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Nom du produit</label>
                            <input type="text" name="nom" required placeholder="Ex: Processeur Intel Core i9" 
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Prix (€)</label>
                                <div class="relative">
                                    <input type="number" step="0.01" name="prix" required placeholder="0.00" 
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                                    <span class="absolute right-6 top-4 text-slate-400 font-bold">€</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Quantité en stock</label>
                                <input type="number" name="quantite" required placeholder="Ex: 50" 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Catégorie</label>
                            <div class="relative">
                                <select name="id" required 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:border-blue-500 transition appearance-none cursor-pointer">
                                    <option value="" disabled selected>Choisir une catégorie...</option>
                                    <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->nom) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-6 top-5 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>



                    <div class="flex items-center justify-end space-x-4">
                        <button type="reset" class="px-8 py-4 text-slate-400 font-bold hover:text-red-500 transition">
                            Annuler
                        </button>
                        <button type="submit" class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-xl shadow-slate-200">
                            <i class="fa-solid fa-plus mr-2"></i> Ajouter à l'inventaire
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>
</html>