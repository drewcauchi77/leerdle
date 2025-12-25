<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="mt-16">
        <h1 class="font-bold">Home</h1>
        <Link href="/about">Go to About 22</Link>
    </div>
</template>
