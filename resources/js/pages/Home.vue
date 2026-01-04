<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';

const page = usePage()
const device = computed(() => page.props.device)
const fetchData = ref(null);
const error = ref(null);

const dataFromApi = async () => {
    try {
        const res = await fetch('https://allowed-monster-splendid.ngrok-free.app/api/v1/test', {
            headers: {
                'ngrok-skip-browser-warning': 'true',
                'Accept': 'application/json'
            }
        });

        if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
        }

        fetchData.value = await res.json();
        console.log('Success:', fetchData.value);
    } catch (err) {
        error.value = err.message;
        console.error('Error fetching data:', err);
    }
}

onMounted(async () => {
    await dataFromApi()
});
</script>

<template>
    <Head title="Home"></Head>
    <div class="mt-16">
        <h1>Home test w2 222</h1>
        <h2>Device -> IsMobile: {{ device?.is_mobile }}</h2>
        <h2>Device -> IsIos: {{ device?.is_ios }}</h2>
        <h2>Device -> IsAndroid: {{ device?.is_android }}</h2>

        <div v-if="error" class="text-red-500">Error: {{ error }}</div>
        <div v-else-if="fetchData">
            <pre>{{ fetchData }}</pre>
        </div>
        <div v-else>Loading...</div>
    </div>
</template>
