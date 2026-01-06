<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { index, show } from '@/actions/App/Http/Controllers/Exercise/ExerciseLanguageController';

// PROPS AND API CALL
const props = defineProps({
    languages: Array
});
</script>

<template>
    <Head title="Exercises"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/exercises</h1>

        <pre>{{ props.languages }}</pre>

        <ul>
            <li v-for="(language, index) in props.languages" :key="index">
                <Link :href="show(language.slug)">
                    {{ language.name }}
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
