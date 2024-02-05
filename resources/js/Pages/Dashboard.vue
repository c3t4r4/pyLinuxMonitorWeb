<template>
    <DefaultPanel title="Dashboard">
        <Stats :groups="groups"/>
    </DefaultPanel>
</template>

<script setup>
    import { Inertia } from '@inertiajs/inertia';
    import Stats from "@/Customs/Panels/Stats.vue";
    import DefaultPanel from "@/Customs/Panels/DefaultPanel.vue";

    const props = defineProps({
        groups: Object
    });

    import { onMounted, onUnmounted, ref } from 'vue';

    let intervalId;

    const seconds = 10 * 1000; // 10 Segudnos

    const refreshData = () => {
        Inertia.reload({ only: ['groups'] }); // Recarrega apenas o componente específico se necessário
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
