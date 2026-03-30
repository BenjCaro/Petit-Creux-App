<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import type { Category, DifficultyLevel, Duration } from '@/types/recipe';
import { Link } from '@inertiajs/vue3';


const difficulties = usePage().props.recipe_difficulty_levels as DifficultyLevel[];
const durations = usePage().props.recipe_duration as Duration[];

const props = defineProps<{
  category: Category  
  filters: {
    difficulty: number | string | null;
    duration: number | null;
  }
}>();

</script>
<template>
    <section class="max-w-4xl mx-auto px-4 mt-5 mb-2">
        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
            Filtrer
        </h2> 
        <div class="flex flex-wrap gap-3">
           <Link 
                v-for="level in difficulties" 
                :key="level.value" 
                :href="`/categories/${category.slug}`" 
                :data="{
                    ...filters,
                    difficulty: level.value  
                }"
                class="px-4 py-2 border rounded-full text-sm font-medium transition-all shadow-sm"
                :class="{ 
                    'border-orange-500 bg-orange-50 text-orange-600 shadow-inner': filters?.difficulty == level.value,
                    'bg-white border-gray-200 text-gray-700 hover:border-orange-500 hover:text-orange-600': filters?.difficulty != level.value }"
                preserve-scroll
           >
                {{ level.label }}
            </Link>
        </div>
    </section>
    <section class="max-w-4xl mx-auto px-4 mt-2 mb-4">
        <div class="flex flex-wrap gap-3">
            <Link v-for="(duration, index) in durations"
               :key="index"
               :href="`/categories/${category.slug}`"
                class="px-4 py-2 border rounded-full text-sm font-medium transition-all shadow-sm"
                :class="{ 
                    'border-orange-500 bg-orange-50 text-orange-600 shadow-inner': filters.duration == duration.value ,
                    'bg-white border-gray-200 text-gray-700 hover:border-orange-500 hover:text-orange-600': filters.duration != duration.value}"
                :data="{
                    ...filters,
                    duration: duration.value,
                    
                }"
                preserve-scroll
               >
                {{ duration.label }}
            </Link>
            <Link 
                v-if="filters"
                :href="`/categories/${category.slug}`"
                class="px-4 py-2 text-sm text-gray-400"
            >
                Réinitialiser
            </Link>
        </div>
    </section>

</template>