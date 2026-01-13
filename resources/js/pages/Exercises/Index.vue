<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

// PROPS AND API CALL
const props = defineProps({
    language: String,
    format: String,
    subject: String,
    exercises: Array
});
</script>

<template>
    <Head title="Exercises"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/{{ props.language }}/exercises/{{ props.format }}/{{ props.subject }}</h1>

        <pre>{{ props.exercises }}</pre>

        <ul>
            <li v-for="(exercise, index) in props.exercises" :key="index">
                {{ exercise.title }}
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
