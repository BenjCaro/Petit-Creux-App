<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';

defineProps<{
  title?: string
}>();
</script>

<template>
    
    <MainLayout>

        <h1>
            {{ title }}
        </h1>

    </MainLayout>
    

</template>