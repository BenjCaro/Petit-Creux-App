<script setup lang="ts">
import Pagination from '@/components/Global/Pagination.vue';
import RecipeCard from '@/components/Global/RecipeCard.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import type { Category, Paginator } from '@/types/recipe';
import RecipesFilter from '@/components/Global/RecipesFilter.vue';

defineProps<{
    category: Category
    total: number
    recipes: Paginator
    filters: {
    difficulty: number | string | null;
    duration: number | null;
    }
}>()
</script>

<template>
    <MainLayout>
        <div class="flex items-center justify-between mb-2">
            <h1 class="w-full text-gray-900 tracking-tight flex items-center justify-center flex-wrap gap-x-4 gap-y-2 py-6">  
                <span class="hidden md:block shrink-0 w-2 h-10 bg-emerald-600 rounded-full"></span>
                <span class="font-black text-3xl md:text-4xl capitalize">
                    {{ category.name }}
                </span>
                <span v-if="total" class="self-center inline-flex items-center px-3 py-1 bg-orange-50 text-orange-600 text-sm font-bold rounded-full border border-orange-100 whitespace-nowrap shadow-sm">
                    {{ total }} {{ total > 1 ? 'recettes' : 'recette' }}
                </span>
            </h1>
        </div>
        <RecipesFilter :filters="filters" :category="category"/>
        <section v-if="recipes?.data?.length > 0"  class="max-w-7xl mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <RecipeCard 
                    v-for="recipe in recipes.data" 
                    :key="recipe.id"
                    :recipe="recipe"
                    :category-name="category.name"
                />       
            </div>
            <Pagination :items="recipes"/>
        </section>
        <div v-else class="text-center py-20">
            <p class="text-gray-400 font-medium text-lg">
                {{ filters.difficulty ? 'Aucune recette ne correspond à ce niveau de difficulté.' : 'Aucune recette dans cette catégorie pour le moment.' }}
            </p>
        </div>
    </MainLayout>
</template>