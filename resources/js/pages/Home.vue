<script setup lang="ts">

import MainLayout from '@/layouts/MainLayout.vue';
import SearchBar from '@/components/Global/SearchBar.vue';
import CategoryMenu from '@/components/Global/CategoryMenu.vue';



defineProps<{
  title?: string,
  categories: any[]
}>();
</script>

<template>
    
    <MainLayout>

        <h1 class="text-center text-4xl p-3">
            {{ title }}
        </h1>
        <CategoryMenu :categories="categories"/>
        <SearchBar/>
    </MainLayout>

</template>