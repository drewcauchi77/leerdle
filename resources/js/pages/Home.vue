<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { index } from '@/actions/App/Http/Controllers/Exercise/ExerciseLanguageController';
</script>

<template>
    <Head title="Home"></Head>
    <div class="mt-16">
        <h1 class="text-4xl my-10">/</h1>

        <Link href="/nl" class="underline">NL</Link>
    </div>
</template>
