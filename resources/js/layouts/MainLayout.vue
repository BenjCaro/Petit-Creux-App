<script setup lang="ts">
import FlashView from '@/components/Global/FlashView.vue';
import Footer from '@/components/Global/Footer.vue';
import Header from '@/components/Global/Header.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <Header />
        <main class="flex-grow">
            <div class="max-w-6xl mx-auto bg-white min-h-screen shadow-sm border-x border-gray-200">
                <div class="px-6 py-10">
                    <FlashView/>   
                    <slot />
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>