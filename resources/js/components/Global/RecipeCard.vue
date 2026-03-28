<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Clock, ChefHat } from 'lucide-vue-next';
import { Recipe } from '@/types/recipe';

defineProps<{
    recipe: Recipe;
    categoryName?: string;
}>();
</script>

<template>
    <Link 
        :key="recipe.id"
        :href="`/recettes/${recipe.slug}`"
        class="group flex items-center bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-400 hover:shadow-lg transition-all duration-300 h-full"
    >
        <div class="w-20 h-20 bg-gray-50 rounded-xl flex-shrink-0 flex items-center justify-center text-3xl group-hover:bg-orange-50 group-hover:scale-105 transition-all duration-300">
            🍳
        </div>
        <div class="ml-4 flex-grow min-w-0">
            <span class="text-[10px] font-bold uppercase tracking-wider text-orange-500 mb-1 block">
                {{ categoryName }}
            </span>

            <h3 class="text-sm font-bold text-gray-800 group-hover:text-orange-600 transition-colors truncate leading-snug">
                {{ recipe.title }}
            </h3>
            <div class="flex flex-col gap-1.5 mt-3">
                <div class="flex items-center gap-2 text-[11px] text-gray-500 font-medium">
                    <div class="w-4 flex-shrink-0 flex justify-center">
                        <Clock :size="14" stroke-width="2.5" class="text-gray-400" />
                    </div>
                    <span>{{ recipe.duration }} min</span>
                </div>
                <div class="flex items-center gap-2 text-[11px] text-gray-500 font-medium">
                    <div class="w-4 flex-shrink-0 flex justify-center">
                        <ChefHat :size="14" stroke-width="2.5" class="text-gray-400"/>
                    </div>
                    <span class="truncate font-medium">{{ recipe.difficulty_label }}</span>
                </div>
            </div>
        </div>
    </Link>
</template>
