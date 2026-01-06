<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { show } from '@/actions/App/Http/Controllers/Exercise/ExerciseSubjectController';

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
        <h1 class="text-4xl my-10">/exercises/{{ props.language }}/{{ props.format }}</h1>

        <pre>{{ props.subjects }}</pre>

        <ul>
            <li v-for="(subject, index) in props.subjects" :key="index">
                <Link :href="show({ language: props.language, format: props.format, subject: subject.slug })">
                    {{ subject.name }}
                </Link>
            </li>
        </ul>

        <Link href="/" class="underline">Home</Link>
    </div>
</template>
