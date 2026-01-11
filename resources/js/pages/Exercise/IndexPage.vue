<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { show } from '@/actions/App/Http/Controllers/Exercise/ExerciseFormatController';

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
            <li v-for="(format, index) in props.formats" :key="index">
                <Link :href="show({ language: props.language, format: format.slug })">
                    {{ format.name }}
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
