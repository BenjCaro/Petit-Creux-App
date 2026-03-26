<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import CategoryList from '@/components/Global/CategoryList.vue';
import { Category } from '@/types/recipe';

defineProps<{
    category: Category
}>()
</script>

<template>
    <MainLayout>
        <h1 class="text-center font-bold text-4xl p-3">
            {{ category.name }}
        </h1>
        <section>
            <ul>
                <li v-for="recipe in category.approved_recipes">
                    {{ recipe.title }}
                </li>
            </ul>
        </section>
    </MainLayout>
</template>