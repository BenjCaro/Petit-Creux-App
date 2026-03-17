<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import SearchBar from '@/components/Global/SearchBar.vue';

defineProps<{
  title?: string
}>();
</script>

<template>
    
    <MainLayout>

        <h1 class="text-center p-3">
            {{ title }}
        </h1>
        <SearchBar/>
    </MainLayout>
    

</template>