<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Pizza, CircleX } from 'lucide-vue-next';
import { computed, ref, watch } from 'vue';

const page = usePage();
const show = ref(false);

const flash = computed(() => page.props.flash as { message?: string, status?: string });
const message = computed(() => flash.value?.message || flash.value?.status);

watch(message, (newVal) => {
  if (newVal) {
    show.value = true;
    setTimeout(() => show.value = false, 5000);
  }
}, { immediate: true });
</script>

<template>
  <Transition name="slide-fade">
    <div v-if="show && message" 
         class="fixed bottom-5 right-5 z-50 flex items-center p-4 mb-4 text-white bg-emerald-500 rounded-lg shadow-lg dark:bg-emerald-500" 
         role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-200 bg-emerald-500 rounded-lg">
        <Pizza/>
      </div>
      <div class="ml-3 text-sm font-medium pr-8">{{ message }}</div>
        <button 
            @click="show = false" 
            type="button"
            class="ml-auto inline-flex items-center justify-center h-8 w-8 rounded-lg 
                  bg-white/20 text-white hover:bg-white/30 
                  focus:outline-none focus:ring-2 focus:ring-white/50
                  transition-all duration-200 ease-in-out"
          >
            <span class="sr-only">Fermer</span>
            <CircleX class="w-5 h-5" />
          </button>
    </div>
  </Transition>
</template>

<style scoped>
.slide-fade-enter-active { transition: all 0.3s ease-out; }
.slide-fade-leave-active { transition: all 0.4s cubic-bezier(1, 0.5, 0.8, 1); }
.slide-fade-enter-from, .slide-fade-leave-to { transform: translateX(20px); opacity: 0; }
</style>