<script setup>
import Header from '@/components/Global/Header.vue';
import Footer from '@/components/Global/Footer.vue';
</script>

<template>
    <div class="flex flex-col min-h-screen">
        
        <Header />

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <slot />
            </div>
        </main>

        <Footer />
        
    </div>
</template>