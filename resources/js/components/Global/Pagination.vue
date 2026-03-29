<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import type {Paginator} from '@/types/recipe';

defineProps<{
    items : Paginator
}>();
</script>

<template>
    <div>
        <nav v-if="items.links.length > 3" class="hidden md:flex items-center justify-center space-x-1 mt-8" aria-label="pagination">
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
                    preserve-scroll
                    > 
                    <span v-html="link.label"></span>
                </Link>
            </template>
        </nav>
        <nav v-if="items.links.length > 3" class="md:hidden flex items-center justify-between mt-8 px-4 py-3 bg-white border border-gray-100 rounded-xl shadow-sm">
            <div class="flex-1 flex justify-start">
                <Link 
                    v-if="items.prev_page_url" 
                    :href="items.prev_page_url"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-orange-50 hover:border-orange-200 transition-all duration-200"
                    preserve-scroll>
                    Previous
                </Link>
                <span v-else class="px-4 py-2 text-sm font-medium text-gray-300 border border-gray-100 rounded-lg cursor-not-allowed">
                    Previous
                </span>
            </div>
            <div class="flex items-center">
                <span class="text-sm font-bold text-gray-900 bg-orange-50 px-3 py-1 rounded-full border border-orange-100">
                    {{ items.current_page }} <span class="text-orange-400 mx-0.5">/</span> {{ items.last_page }}
                </span>
            </div>
            <div class="flex-1 flex justify-end">
                <Link 
                    v-if="items.next_page_url" 
                    :href="items.next_page_url"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-orange-50 hover:border-orange-200 transition-all duration-200"
                    preserve-scroll>
                    Next
                </Link>
                <span v-else class="px-4 py-2 text-sm font-medium text-gray-300 border border-gray-100 rounded-lg cursor-not-allowed">
                    Next
                </span>
            </div>
        </nav>
    </div>
</template>