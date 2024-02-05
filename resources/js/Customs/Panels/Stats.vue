<template>
        <div class="px-2 bg-gray-300 space-y-16 py-16 xl:space-y-20 rounded">
            <!-- Recent activity table -->
            <div>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                    <div class="flex-1 mt-3 px-2 flex justify-center lg:ml-6 lg:justify-end">

                        <div class="ml-6 max-w-lg  lg:max-w-xs">
                            <Link as="button" :href="route(`dashboard`)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-700 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-800 focus:ring-offset-2 sm:w-auto hover:-translate-y-1 hover:scale-110 duration-300">Atualizar</Link>
                        </div>
                    </div>

                </div>
                <div class="mt-6 overflow-hidden border-t border-gray-100">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                            <table class="w-full text-left">
                                <tbody>
                                <template v-for="(item, itemIndex) in groups" :key="itemIndex">
                                    <tr class="text-sm leading-6 text-gray-900">
                                        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                                            <time>Grupo: {{ item.name }}</time>
                                            <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50" />
                                        </th>
                                    </tr>
                                    <dl v-for="node in item.nodes" :key="node.id" class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-4 md:divide-x md:divide-y-0">
                                        <div  class="px-4 py-5 sm:p-6">
                                            <dt class="text-base font-normal text-gray-900">{{ (node.hostname ? node.hostname : "Aguardando") }} - Processador</dt>
                                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                <div v-if="node.lastlog" class="flex items-baseline font-semibold text-green-600">
                                                    Uso: {{ node.lastlog.cpu_usage }}% de {{ node.lastlog.cpu_total }} Cores
                                                </div>

                                                <div v-else class="flex items-baseline font-semibold text-green-600">
                                                    Aguardando
                                                </div>
                                            </dd>
                                        </div>
                                        <div class="px-4 py-5 sm:p-6">
                                            <dt class="text-base font-normal text-gray-900">Memória Ram</dt>
                                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                <div v-if="node.lastlog" class="flex items-baseline font-semibold text-yellow-700">
                                                    Uso: {{ node.lastlog.ram_usage }}% de {{ node.lastlog.ram_total }} Gb
                                                </div>

                                                <div v-else class="flex items-baseline font-semibold text-yellow-700">
                                                    Aguardando
                                                </div>
                                            </dd>
                                        </div>
                                        <div class="px-4 py-5 sm:p-6">
                                            <dt class="text-base font-normal text-gray-900">SSD / HDD</dt>
                                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                <div v-if="node.lastlog" class="flex items-baseline font-semibold text-indigo-600">
                                                    Uso: {{ node.lastlog.disk_usage }}% de {{ node.lastlog.disk_total }} Gb
                                                </div>

                                                <div v-else class="flex items-baseline font-semibold text-indigo-600">
                                                    Aguardando
                                                </div>
                                            </dd>
                                        </div>
                                        <div class="px-4 py-5 sm:p-6">
                                            <dt class="text-base font-normal text-gray-900">Data Update</dt>
                                            <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                <div v-if="node.lastlog" class="flex items-baseline font-semibold text-emerald-900">
                                                    {{ (node.lastlog.created_at ? moment(node.lastlog.created_at).format("DD/MM/YYYY H:mm:ss") : "-") }}
                                                </div>
                                                <div v-else class="flex items-baseline font-semibold text-emerald-900">
                                                    Aguardando
                                                </div>
                                            </dd>
                                        </div>
                                    </dl>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script setup>
    import moment from "moment";
    import {Link} from "@inertiajs/vue3";
    import { onMounted, onUnmounted, ref } from 'vue';

    const props = defineProps({
        groups: Object
    });

    let intervalId;

    const refreshData = () => {
    };

    onMounted(() => {
        // Configurar o intervalo para chamar refreshData a cada 5 segundos
        intervalId = setInterval(refreshData, 5000);
    });

    onUnmounted(() => {
        // Limpar o intervalo quando o componente for desmontado
        clearInterval(intervalId);
    });


</script>

