<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Recipe } from '@/types/recipe';
import { Clock, Utensils, CheckCircle2} from 'lucide-vue-next';

defineProps<{
    recipe: Recipe
}>();

</script>

<template>
    <MainLayout> 
        <h1 class="text-center font-bold text-4xl p-3 font-extrabold text-gray-950 mb-6">
            {{ recipe.title }}
        </h1>
        <div class="flex items-center justify-center gap-3 mb-3">
            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full border border-gray-100 text-sm italic">{{recipe.category?.name}}</span>
            <Clock :size="18" stroke-width="2.5" class="text-orange-500" />
            <span class="font-bold">{{ recipe.duration }} min</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-[300px,1fr] gap-12 items-start">  
            <section class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:sticky md:top-6 h-fit">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-950 mb-8">
                    <Utensils :size="18" stroke-width="2"/> <span>Ingrédients</span>
                </h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-x-6 gap-y-4 text-gray-700">
                    <li v-for="ingredient in recipe.ingredients" :key="ingredient.id" class="flex items-center gap-3 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                        <span class="w-2 h-2 rounded-full bg-orange-300 flex-shrink-0"></span>
                        <span class="font-medium text-gray-900 min-w-[60px] text-right">{{ ingredient.pivot.quantity }} {{ ingredient.pivot.unit }}</span>
                        <span class="text-gray-600">de {{ ingredient.name }}</span>
                    </li>
                </ul>
            </section>
            <section class="mt-12">
                <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-900 mb-8">
                    <CheckCircle2 :size="28" class="text-orange-500" />
                    Préparation
                </h2>
                <div class="relative">
                    <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gray-100 hidden md:block"></div>
                    <ol class="space-y-10 relative">
                        <li v-for="(step, index) in recipe.steps" 
                            :key="step.id" 
                            class="group flex flex-col md:flex-row gap-4 md:gap-8">
                            <div class="flex-shrink-0 z-10">
                                <div class="w-12 h-12 rounded-full bg-white border-4 border-orange-50 text-orange-600 flex items-center justify-center font-black text-lg shadow-sm group-hover:border-orange-200 transition-colors">
                                    {{ index + 1 }}
                                </div>
                            </div>
                            <div class="flex-1 bg-white p-6 rounded-2xl border border-gray-50 shadow-sm group-hover:shadow-md transition-shadow">
                                <h3 class="text-sm font-bold uppercase tracking-wider text-orange-500 mb-2">
                                    Étape {{ index + 1 }}
                                </h3>
                                <p class="text-gray-700 leading-relaxed text-lg">
                                    {{ step.content }}
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </section>
        </div>
    </MainLayout>
</template>