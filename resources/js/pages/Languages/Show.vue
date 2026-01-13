<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

// PROPS AND API CALL
const props = defineProps({
    language: String
});
</script>

<template>
    <Head title="Exercises"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/{{ props.language }}</h1>

        <ul>
            <li>
                <Link href="/nl/exercises">
                    Exercises
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
