<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {Paginator} from '@/types/recipe';

defineProps<{
    items : Paginator
}>();
</script>

<template>
    <div>
        <nav v-if="items.links.length > 3" class="flex items-center justify-center space-x-1 mt-8" aria-label="pagination">
            <template v-for="(link, label) in items.links" :key="label">
                <div v-if="link.url === null" 
                    class="px-4 py-2 text-gray-400 border border-gray-200 rounded-lg text-sm cursor-not-allowed"
                    v-html="link.label">
                </div>
                <Link v-else 
                    :href="link.url" 
                    class="px-4 py-2 border rounded-lg text-sm transition-all duration-200"
                    :class="{ 
                            'bg-orange-500 text-white border-orange-500 font-bold': link.active, 
                            'bg-white text-gray-700 border-gray-200 hover:bg-orange-50 hover:border-orange-200': !link.active 
                    }"
                    v-html="link.label"
                    preserve-scroll
                    />   
            </template>
        </nav>
    </div>
</template>