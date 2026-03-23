<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {Paginator} from '@/types/recipe';


defineProps<{
   recipes : Paginator,
   filters: {
    search: string | null;
    category: string | null;
  }
   
}>();
</script>

<template>
    <div v-if="recipes.total > 0" class="max-w-7xl mx-auto px-4 mb-4">
        <p class="text-sm text-gray-500">
            <span class="font-bold text-gray-900">{{ recipes.total }}</span> 
            {{ recipes.total > 1 ? 'recettes trouvées' : 'recette trouvée' }}
        </p>
    </div>
    <section v-if="recipes?.data?.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        <div v-for="recipe in recipes.data" :key="recipe.id" 
            class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-lg font-bold text-gray-900">{{ recipe.title }}</h3>
                    <span v-if="recipe.category" class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                        {{ recipe.category.name }}
                    </span>
                </div>
                 <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                    {{ recipe.slug }} </p>
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-sm text-gray-400 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ recipe.duration }} min
                    </span>
                    <Link :href="`/recettes/${recipe.slug}`" 
                        class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-semibold hover:bg-emerald-100 transition-colors border border-emerald-100">
                        Voir la recette →
                    </Link>
                </div>
            </div>
        </div>
    </section> 
    <div v-else-if="filters.search || filters.category" class="max-w-7xl mx-auto px-4 py-16 text-center">
        <div class="bg-gray-50 rounded-2xl p-8 border-2 border-dashed border-gray-200">
            <p class="text-gray-500 font-medium">
                Désolé, aucune recette ne correspond à votre recherche.
            </p>
        </div>
    </div>
    <div v-else class="max-w-7xl mx-auto px-4 py-20 text-center">
        <span class="text-gray-300 text-5xl mb-4 block">🍳</span>
        <p class="text-gray-400 font-light italic text-lg">
            Quelle pépite allez-vous dénicher aujourd'hui ?
        </p>
    </div>
    <div>
        <nav v-if="recipes.links.length > 3" class="flex items-center justify-center space-x-1 mt-8">
            <template v-for="(link, label) in recipes.links" :key="label">
                <div v-if="link.url === null" 
                        class="px-4 py-2 text-gray-400 border border-gray-200 rounded-lg text-sm cursor-not-allowed"
                        v-html="link.label">
                </div>
                    <Link v-else 
                        :href="link.url" 
                        class="px-4 py-2 border rounded-lg text-sm transition-all duration-200"
                        :class="{ 
                            'bg-orange-500 text-white border-orange-500 font-bold': link.active, 
                            'bg-white text-gray-700 border-gray-200 hover:bg-orange-50 hover:border-orange-200': !link.active 
                        }"
                        v-html="link.label"
                        preserve-scroll/>   
            </template>
        </nav>
    </div>
</template>