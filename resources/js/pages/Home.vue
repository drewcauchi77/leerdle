<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';

const page = usePage()

const device = computed(() => page.props.device)

const fetchData = ref(null);

onMounted(async () => {
    const res = await fetch('http://leerdle.test/api/test');
    fetchData.value = await res.json();
});
</script>

<template>
    <Head title="Home"></Head>
    <div class="mt-16">
        <h1 class="font-bold">Home</h1>
        <Link href="/about">Go to About from Andrew !!</Link>

        <h2>Device -> IsMobile: {{ device?.is_mobile }}</h2>
        <h2>Device -> IsIos: {{ device?.is_ios }}</h2>
        <h2>Device -> IsAndroid: {{ device?.is_android }}</h2>

        VALUE FROM API: {{ fetchData }}

        test
    </div>
</template>
