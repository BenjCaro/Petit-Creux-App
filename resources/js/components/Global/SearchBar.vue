<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';
import { Paginator } from '@/types/recipe';

defineProps<{
   count: Number,
   recipes : Paginator,
   search: string | null
}>();
</script>

<template>
    <section class="max-w-4xl mx-auto px-4 py-6">
        <Form action="/" method="get" class="relative group">
            <div class="flex flex-col md:flex-row items-stretch gap-0 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden focus-within:ring-2 focus-within:ring-orange-500/20 focus-within:border-orange-500 transition-all">  
                <div class="flex-grow relative">
                    <input 
                        type="text" 
                        placeholder="Ex: Tarte aux pommes, noisettes, ..." 
                        name="search" 
                        :value="search"
                        required
                        class="w-full h-full px-6 py-4 text-gray-800 placeholder-gray-400 bg-transparent focus:outline-none" >
                </div>
                <button 
                    type="submit" 
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 font-bold transition-colors flex items-center justify-center gap-2 active:scale-95"
                >
                    <span class="md:hidden">Rechercher</span>
                    <span class="text-xl">🔍</span>
                </button>
            </div> 
            <p class="mt-3 text-sm text-gray-500 text-center">
                Trouvez l'inspiration parmi plus de <span class="font-semibold text-orange-600">{{ count }} pépites</span> culinaires.
            </p>
        </Form>
    </section>
    <section v-if="recipes.data.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
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