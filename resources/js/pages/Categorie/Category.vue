<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import RecipeCard from '@/components/Global/RecipeCard.vue';
import { Category } from '@/types/recipe';


defineProps<{
    category: Category
}>()
</script>

<template>
    <MainLayout>
        <h1 class="text-center font-black text-4xl p-8 text-gray-900 tracking-tight">
            {{ category.name }} 
        </h1>
        <section class="max-w-7xl mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <RecipeCard 
                    v-for="recipe in category.approved_recipes" 
                    :key="recipe.id"
                    :recipe="recipe"
                    :category-name="category.name"
                />       
            </div>
            <div v-if="!category.approved_recipes" class="text-center py-20">
                <p class="text-gray-400 font-medium text-lg">Aucune recette dans cette catégorie pour le moment 👨‍🍳</p>
            </div>
        </section>
    </MainLayout>
</template>