<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Category} from '@/types/recipe'; 
import RecipeCard from './RecipeCard.vue';

defineProps<{
  categories: Category[];

}>();

</script>

<template>
    <div class="max-w-7xl mx-auto p-6 space-y-12">     
        <section v-for="category in categories" :key="category.id" class="border-b border-gray-100 pb-8 last:border-0">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <span class="w-2 h-8 bg-emerald-600 rounded-full"></span>
                    {{ category.name }}
                </h2>
                <Link :href="`/categories/${category.slug}`" 
                      class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-semibold hover:bg-emerald-100 transition-colors border border-emerald-100">
                    Voir tout →
                </Link>
            </div>
            <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <RecipeCard
                    v-for="recipe in category.approved_recipes?.slice(0, 8)"
                    :key="recipe.id"
                    :recipe="recipe"
                    :category-name="category.name"
                />
            </div>
            <div class="md:hidden">
                <Link :href="`/categories/${category.slug}`" 
                      class="block p-6 bg-gray-50 rounded-2xl border border-dashed border-gray-300 text-center">
                    <p class="text-gray-600 font-medium">Découvrir les recettes "{{ category.name }}"</p>
                    <span class="text-xs text-gray-400">Appuyez pour explorer la catégorie</span>
                </Link>
            </div>
        </section>
    </div>
</template>