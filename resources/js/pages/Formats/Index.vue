<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { index } from '@/actions/App/Http/Controllers/SubjectController';

// PROPS AND API CALL
const props = defineProps({
    language: String,
    formats: Array
});
</script>

<template>
    <Head title="Exercises"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/{{ props.language }}/exercises</h1>

        <pre>{{ props.formats }}</pre>

        <ul>
            <li v-for="(format, i) in props.formats" :key="i">
                <Link :href="index({ language: props.language, format: format.slug })">
                    {{ format.name }}
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
