<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {Paginator} from '@/types/recipe';
import RecipeCard from './RecipeCard.vue';


defineProps<{
   recipes : Paginator,
   filters: {
    search: string | null;
    category: string | null;
    difficulty: number | string | null;
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
        <RecipeCard 
            v-for="recipe in recipes.data" 
            :key="recipe.id" 
            :recipe="recipe"
            :category-name="recipe.category?.name" 
        />
    </section>
    <div v-else-if="filters.search || filters.category || filters.difficulty" class="max-w-7xl mx-auto px-4 py-16 text-center">
        <div class="bg-gray-50 rounded-2xl p-8 border-2 border-dashed border-gray-200">
            <p class="text-gray-500 font-medium">
                Désolé, aucune recette ne correspond à votre recherche.
            </p>
        </div>
    </div>
    <div v-else class="max-w-2xl mx-auto px-4 py-12 text-center">
        <p class="text-sm text-gray-400 uppercase tracking-widest mb-6">Suggestions du moment</p>
        <div class="flex flex-wrap justify-center gap-2">
            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full border border-gray-100 text-sm italic">#Chocolat</span>
            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full border border-gray-100 text-sm italic">#RecettesRapides</span>
            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full border border-gray-100 text-sm italic">#PetitDéjeuner</span>
        </div>
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