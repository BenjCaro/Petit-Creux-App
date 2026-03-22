<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { Paginator } from '@/types/recipe';
import ResultsList from './ResultsList.vue';

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
    <ResultsList :recipes="recipes"/>
    
</template>