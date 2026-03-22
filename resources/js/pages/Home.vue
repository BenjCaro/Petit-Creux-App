<script setup lang="ts">

import MainLayout from '@/layouts/MainLayout.vue';
import SearchBar from '@/components/Global/SearchBar.vue';
import CategoryMenu from '@/components/Global/CategoryMenu.vue';
import CategoryList from '@/components/Global/CategoryList.vue';

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

interface Paginator {
    data: Recipe[]; 
    current_page: number;
    last_page: number;
    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];
    total: number;
}

interface Category {
    id: number;
    name: string;
    slug: string;
    recipes: Recipe[];
}

defineProps<{
  title?: string,
  categories: Category[],
  count: number,
  recipes: Paginator,
  search: string | null
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
                <span class="block mt-2 text-sm text-gray-500 font-medium uppercase tracking-tight">
                    — Ou bien choisis une catégorie ci-dessous —
                </span>
            </p>
        </div>
        <CategoryMenu :categories="categories"/>
        <SearchBar :search='search' :count="count" :recipes="recipes"/>  
        <CategoryList :categories="categories"/>
    </MainLayout>

</template>