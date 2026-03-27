<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import RecipeCard from '@/components/Global/RecipeCard.vue';
import { Category, Paginator } from '@/types/recipe';
import { Link } from '@inertiajs/vue3';

defineProps<{
    category: Category
    total: number
    recipes: Paginator
}>()
</script>

<template>
    <MainLayout>
        <h1 class="text-center font-black text-4xl p-8 text-gray-900 tracking-tight">
            {{ category.name }} 
            <span class="text-orange-500 text-xs"> {{ total }} {{ total > 1 ? 'recettes ' : 'recette' }} </span>  
        </h1>
        <section v-if="recipes?.data?.length > 0"  class="max-w-7xl mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <RecipeCard 
                    v-for="recipe in recipes.data" 
                    :key="recipe.id"
                    :recipe="recipe"
                    :category-name="category.name"
                />       
            </div>
            <div v-if="!category.approved_recipes" class="text-center py-20">
                <p class="text-gray-400 font-medium text-lg">Aucune recette dans cette catégorie pour le moment 👨‍🍳</p>
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
        </section>
    </MainLayout>
</template>