<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
interface Category {
    id: number;
    name: string;
    slug: string;
}

defineProps<{
  categories: Category[]
}>();
</script>

<template>

    <section class="max-w-4xl mx-auto px-4 mt-10">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
                Parcourir par catégorie
            </h2>
            <div class="flex flex-wrap gap-3">
                <Link v-for="category in categories" :key="category.id" :href="`/categories/${category.slug}`" class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-600 hover:shadow-sm transition-all shadow-sm">
                    {{ category.name }}
                </Link>
            </div>
        </section>

</template>