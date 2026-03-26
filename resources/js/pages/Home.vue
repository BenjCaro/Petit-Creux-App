<script setup lang="ts">

import MainLayout from '@/layouts/MainLayout.vue';
import SearchBar from '@/components/Global/SearchBar.vue';
import CategoryList from '@/components/Global/CategoryList.vue';
import {Category, Paginator } from '@/types/recipe';

defineProps<{
  title?: string,
  categories: Category[],
  count: number,
  recipes: Paginator,
  filters: {
    search: string | null;
    category: string | null;
    difficulty: string | null;
  }
}>();
</script>

<template> 
    <MainLayout>
        <h1 class="text-center font-bold text-4xl p-3">
            {{ title }}
        </h1>
        <div class="max-w-2xl mx-auto px-4 py-8 ">
            <p class="text-center text-gray-600 leading-relaxed">
                <span class="text-xl font-bold text-gray-900 block mb-1">
                    Tu as été porté par un petit creux ?
                </span>
                <span class="text-base italic font-serif">
                    Te voilà au bon endroit.
                </span> 
                <span class="block mt-6 text-orange-600 font-medium">
                    Inscris dans la barre de recherche les plats ou aliments qui te 
                    <span class="underline decoration-orange-300 underline-offset-4">donnent envie</span> !
                </span>
            </p>
        </div>
        <SearchBar :filters='filters' :count="count" :recipes="recipes" :categories="categories"/>  
        <CategoryList :categories="categories"/>
    </MainLayout>

</template>