<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { category as categoryRoute } from '@/routes';
import type { Category} from '@/types/recipe'; 
import RecipeCard from './RecipeCard.vue';

defineProps<{
  categories: Category[];

}>();

</script>

<template>
    <div class="max-w-7xl mx-auto p-6 space-y-12">     
        <section v-for="category in categories" :key="category.id" class="border-b border-gray-100 pb-8 last:border-0">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 flex items-center flex-wrap gap-x-3 gap-y-1">
                    <span class="shrink-0 w-1.5 h-6 md:w-2 md:h-8 bg-emerald-600 rounded-full"></span>
                    <span class="leading-none capitalize">
                        {{ category.name }}
                    </span>
                    <span 
                        v-if="category.approved_recipes_count" 
                        class="inline-flex items-center px-2 py-0.5 bg-orange-50 text-orange-600 text-xs font-semibold rounded-md border border-orange-100 whitespace-nowrap"
                    >
                        {{ category.approved_recipes_count }} 
                        {{ category.approved_recipes_count > 1 ? 'recettes' : 'recette' }}
                    </span>
                </h2>
                <Link :href=categoryRoute(category) 
                      class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-semibold hover:bg-emerald-100 transition-colors border border-emerald-100">
                    Voir tout →
                </Link>
            </div>
            <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <RecipeCard
                    v-for="recipe in category.approved_recipes"
                    :key="recipe.id"
                    :recipe="recipe"
                    :category-name="category.name"
                />
            </div>
            <div class="md:hidden">
                <Link :href=categoryRoute(category) 
                      class="block p-6 bg-gray-50 rounded-2xl border border-dashed border-gray-300 text-center">
                    <p class="text-gray-600 font-medium">Découvrir les recettes "{{ category.name }}"</p>
                    <span class="text-xs text-gray-400">Appuyez pour explorer la catégorie</span>
                </Link>
            </div>
        </section>
    </div>
</template>