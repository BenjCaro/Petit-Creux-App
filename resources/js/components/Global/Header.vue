<script setup>
import { Link } from '@inertiajs/vue3';
const linkMenu = [
    'Categorie',
    'Recettes',
    'Connexion'
];

</script>

<template>

    <header>
        <nav>
            <div>
                <Link href="">
                    Logo Petit Creux
                </Link>
            </div>
            <ul>
                <li v-for="link in linkMenu" :key="link">
                    {{ link }}
                </li>
            </ul>
        </nav>
    </header>
    
</template>

