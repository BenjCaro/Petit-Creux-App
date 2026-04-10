<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { Menu, X } from 'lucide-vue-next';
import { ref} from 'vue';
import { home, categories, login, logout, dashboard } from '@/routes';

const auth = usePage().props.auth;

const isMenuOpen = ref(false);

const linkMenu = 
     [
        { name: 'Toutes nos recettes', route: categories(), method: 'get' as const},
        { name: 'A propos', route: '/about', method: 'get' as const}
    ];
</script>

<template>
    <header class="bg-emerald-700 text-white relative shadow-md sticky top-0 z-50">
        <nav class="flex justify-between items-center p-4 max-w-7xl mx-auto">
            <Link :href=home() class="font-bold text-xl tracking-tight">
                Petit Creux
            </Link>
            <button 
                @click="isMenuOpen = !isMenuOpen" 
                class="md:hidden p-2 hover:bg-emerald-600 rounded-lg transition-colors z-50"
            >
                <Menu v-if="!isMenuOpen" class="w-6 h-6" />
                <X v-else class="w-6 h-6" />
            </button>
            <ul class="hidden md:flex gap-8 items-center font-medium">
                <li v-for="link in linkMenu" :key="link.name">
                    <Link :href="link.route" :method="link.method" class="hover:text-emerald-200 transition-colors">
                        {{ link.name }}
                    </Link>
                </li>
                <template v-if="auth.user">
                    <li>
                        <Link :href="dashboard()" class="hover:text-emerald-200 transition-colors">
                            Mon Compte
                        </Link>
                    </li>
                    <li>
                        <Link :href=logout() method="post" as="button" class="hover:text-emerald-200 transition-colors">
                            Déconnexion
                        </Link>
                    </li>
                </template>
                <template v-else>
                    <li >
                        <Link :href=login() class="hover:text-emerald-200 transition-colors">
                            Se Connecter
                        </Link>
                    </li>
                </template>
            </ul>
        </nav>
        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-2"
        >
            <div v-if="isMenuOpen" class="md:hidden absolute top-full left-0 w-full bg-emerald-800 border-t border-emerald-600 shadow-2xl z-40">
                <ul class="flex flex-col p-6 space-y-4">
                    <li v-for="link in linkMenu" :key="link.name">
                        <Link 
                            :href="link.route" 
                            class="text-lg font-medium block w-full py-2"
                            @click="isMenuOpen = false"
                        >
                            {{ link.name }}
                        </Link>
                    </li>
                    <template v-if="auth.user">
                    <li>
                        <Link :href="dashboard()" class="hover:text-emerald-200 transition-colors">
                            Mon Compte
                        </Link>
                    </li>
                    <li>
                        <Link :href=logout() method="post" as="button" class="hover:text-emerald-200 transition-colors">
                            Déconnexion
                        </Link>
                    </li>
                    </template>
                    <template v-else>
                        <li >
                            <Link :href=login() class="hover:text-emerald-200 transition-colors">
                                Se Connecter
                            </Link>
                        </li>
                    </template>
                </ul>
            </div>
        </Transition>
    </header>
</template>
