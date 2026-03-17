<script setup>
import { Link } from '@inertiajs/vue3';

const linkMenu = [
    {
        name: 'Categories',
        url : '/categories'
    },
    {
        name: 'A propos',
        url : '/about'
    },
    {
        name: 'Connexion',
        url : '/login'
    },

]

</script>

<template>

    <header class="bg-emerald-700">
        <nav class="flex justify-between p-3">
            <div>
                <Link href="/">
                    Logo Petit Creux
                </Link>
            </div>
            <ul class="flex gap-3">
                <Link v-for="link in linkMenu" :key="link" :href="link.url">
                    <li>
                        {{ link.name }}
                    </li>
                </Link>
            </ul>
        </nav>
    </header>
    
</template>

