<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Recipe } from '@/types/recipe';

defineProps<{
    recipe: Recipe
}>();

</script>

<template>
    <MainLayout>
        
        <pre>
            {{ recipe }}
        </pre>

    </MainLayout>
</template>