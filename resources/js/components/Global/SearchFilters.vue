<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import type { Category, DifficultyLevel } from '@/types/recipe';

const difficulties = usePage().props.recipe_difficulty_levels as DifficultyLevel[];

defineProps<{
  categories: Category[],
  filters: {
    search: string | null;
    category: string | null;
    difficulty: number | string | null;
  }
}>();


</script>

<template>
    <section class="max-w-4xl mx-auto px-4 mt-10">
        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
            Filtrer par catégorie
        </h2> 
        <div class="flex flex-wrap gap-3">
            <Link 
                v-for="category in categories" 
                :key="category.id" 
                href="/" 
                :data="{ 
                    category: category.slug,
                    search: filters?.search 
                }"
                class="px-4 py-2 border rounded-full text-sm font-medium transition-all shadow-sm"
                :class="{ 
                    'border-orange-500 bg-orange-50 text-orange-600 shadow-inner': filters?.category === category.slug,
                    'bg-white border-gray-200 text-gray-700 hover:border-orange-500 hover:text-orange-600': filters?.category !== category.slug 
                }"
            >
                {{ category.name }}
            </Link>
            <Link 
                v-if="filters?.category"
                href="/"
                :data="{ search: filters?.search }"
                class="px-4 py-2 text-sm text-gray-400 hover:text-orange-600 underline decoration-dotted decoration-gray-300"
            >
                Réinitialiser la catégorie
            </Link>
        </div>
    </section>
    <section class="max-w-4xl mx-auto px-4 mt-10">
        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
            Filtrer par difficulté
        </h2> 
        <div class="flex flex-wrap gap-3">
           <Link 
                v-for="level in difficulties" 
                :key="level.value" 
                href="/" 
                :data="{
                    category: filters.category, 
                    search: filters?.search,   
                    difficulty: level.value  
                }"
                class="px-4 py-2 border rounded-full text-sm font-medium transition-all shadow-sm"
                :class="{ 
                    'border-orange-500 bg-orange-50 text-orange-600 shadow-inner': filters?.difficulty == level.value,
                    'bg-white border-gray-200 text-gray-700 hover:border-orange-500 hover:text-orange-600': filters?.difficulty != level.value }"
            >
                {{ level.label }}
            </Link>
            <Link 
                v-if="filters?.difficulty"
                href="/"
                :data="{ category: filters?.category, search: filters?.search }"
                class="px-4 py-2 text-sm text-gray-400"
            >
                Réinitialiser
            </Link>
        </div>
    </section>
</template>