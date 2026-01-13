<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { index } from '@/actions/App/Http/Controllers/ExerciseController';

// PROPS AND API CALL
const props = defineProps({
    language: String,
    format: String,
    subjects: Array
});
</script>

<template>
    <Head title="Exercises"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/{{ props.language }}/exercises/{{ props.format }}</h1>

        <pre>{{ props.subjects }}</pre>

        <ul>
            <li v-for="(subject, i) in props.subjects" :key="i">
                <Link :href="index({ language: props.language, format: props.format, subject: subject.slug })">
                    {{ subject.name }}
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
