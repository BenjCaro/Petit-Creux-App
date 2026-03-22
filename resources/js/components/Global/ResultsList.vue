<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {Paginator} from '@/types/recipe';


defineProps<{
   recipes : Paginator,
   
}>();
</script>

<template>
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
                    <Link :href="`/recette/${recipe.slug}`" 
                        class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-semibold hover:bg-emerald-100 transition-colors border border-emerald-100">
                        Voir la recette →
                    </Link>
                </div>
            </div>
        </div>
    </section> 
</template>