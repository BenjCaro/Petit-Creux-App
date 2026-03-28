<script setup lang="ts">

import {Paginator} from '@/types/recipe';
import RecipeCard from './RecipeCard.vue';
import Pagination from './Pagination.vue';


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
    <Pagination :items="recipes"/>
</template>