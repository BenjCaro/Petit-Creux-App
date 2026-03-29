<script setup lang="ts">
import CategoryList from '@/components/Global/CategoryList.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import type { Category } from '@/types/recipe';

defineProps<{
    categories: Category[]
}>();
</script>

<template>
    <MainLayout>
        <h1 class="text-center font-bold text-4xl p-3">
            Découvrez nos Catégories
        </h1>
        <CategoryList :categories="categories"/>
    </MainLayout>
</template>