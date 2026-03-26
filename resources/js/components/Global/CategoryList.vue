<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Category} from '@/types/recipe';

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
                    class="group flex items-center bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-400 hover:shadow-lg transition-all duration-300 h-full"
                >
                    <div class="w-20 h-20 bg-gray-50 rounded-xl flex-shrink-0 flex items-center justify-center text-3xl group-hover:bg-orange-50 group-hover:scale-105 transition-all duration-300">
                        🍳
                    </div>
                    <div class="ml-4 flex-grow min-w-0">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-orange-500 mb-1 block">
                            {{ category.name }}
                        </span>
                        <h3 class="text-sm font-bold text-gray-800 group-hover:text-orange-600 transition-colors truncate leading-snug">
                            {{ recipe.title }}
                        </h3>
                        <div class="flex items-center gap-3 mt-2">  
                            <div class="flex items-center text-[11px] text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ recipe.duration }} min
                            </div>
                            <div class="flex items-center text-[11px] text-gray-500 border-l border-gray-200 pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                {{ recipe.difficulty_label }}
                            </div>
                        </div>
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