<script setup lang="ts">

defineProps<{
   count: Number
}>();
</script>

<template>
    <section class="max-w-4xl mx-auto px-4 py-6">
        <form @submit.prevent="" class="relative group">
            <div class="flex flex-col md:flex-row items-stretch gap-0 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden focus-within:ring-2 focus-within:ring-orange-500/20 focus-within:border-orange-500 transition-all">  
                <div class="relative min-w-[180px] border-b md:border-b-0 md:border-r border-gray-100">
                    <select class="w-full h-full pl-4 pr-10 py-4 bg-transparent text-gray-700 font-medium appearance-none cursor-pointer focus:outline-none">
                        <option value="recipe">🍽️ Recette</option>
                        <option value="ingredient">🥗 Ingrédient</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                <div class="flex-grow relative">
                    <input 
                        type="text" 
                        placeholder="Ex: Tarte aux pommes, noisettes, ..." 
                        name="q" 
                        required
                        class="w-full h-full px-6 py-4 text-gray-800 placeholder-gray-400 bg-transparent focus:outline-none"
                    >
                </div>
                <button 
                    type="submit" 
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 font-bold transition-colors flex items-center justify-center gap-2 active:scale-95"
                >
                    <span class="md:hidden">Rechercher</span>
                    <span class="text-xl">🔍</span>
                </button>
            </div> 
            <p class="mt-3 text-sm text-gray-500 text-center">
                Trouvez l'inspiration parmi plus de <span class="font-semibold text-orange-600">nos {{ count }} pépites</span> culinaires.
            </p>
        </form>
    </section>
</template>