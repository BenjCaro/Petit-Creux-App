<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

interface Recipe {
    id: number;
    title: string;
    slug: string;
    approved: boolean;
    duration: number;
    category_id: number;
    user_id: number;
    category?: Category;
}

interface Category {
    id: number;
    name: string;
    slug: string;
    recipes: Recipe[];
}

defineProps<{
  categories: Category[]

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
                <Link 
                    v-for="recipe in category.recipes" 
                    :key="recipe.id"
                    :href="`/recettes/${recipe.slug}`"
                    class="group flex items-center bg-white p-3 rounded-2xl border border-gray-200 hover:border-orange-400 hover:shadow-md transition-all duration-300 h-full"
                >
                    <div class="w-20 h-20 bg-gray-100 rounded-xl flex-shrink-0 flex items-center justify-center text-2xl group-hover:bg-orange-50 transition-colors">
                        🍳 
                    </div>
                    <div class="ml-4 flex-grow min-w-0">
                        <h3 class="text-base font-semibold text-gray-700 group-hover:text-orange-600 transition-colors truncate">
                            {{ recipe.title }}
                        </h3>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ category.name }}
                        </p>
                    </div>
                </Link>
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