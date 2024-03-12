<template>
    <DefaultPanel title="Dashboard">
        <Stats :groups="groups"/>
    </DefaultPanel>
</template>

<script setup>
    import Stats from "@/Customs/Panels/Stats.vue";
    import DefaultPanel from "@/Customs/Panels/DefaultPanel.vue";

    const props = defineProps({
        groups: Object
    });

    import { onMounted, onUnmounted } from 'vue';
    import {router} from "@inertiajs/vue3";

    let intervalId;

    const seconds = 10 * 1000; // 10 Segudnos

    const refreshData = () => {
        // router.get(route("dashboard"),  {
        //     preserveState: true
        // });
        router.reload({ only: ['groups'] })
    };

    onMounted(() => {
        // Configurar o intervalo para chamar refreshData a cada 5 segundos
        intervalId = setInterval(refreshData, seconds);
    });

    onUnmounted(() => {
        // Limpar o intervalo quando o componente for desmontado
        clearInterval(intervalId);
    });
</script>
